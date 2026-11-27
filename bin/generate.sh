#!/usr/bin/env bash
#
# Gera as classes PHP de UMA versão do schema RAS em src/V<x_y_z>/ a partir do .thrift guardado em thrift/V<x_y_z>/.
#
#   bin/generate.sh <versao>               gera a partir de thrift/V<x_y_z>/ (sem rede)
#   bin/generate.sh <versao> <branch|sha>  copia o .thrift do upstream para thrift/V<x_y_z>/, registra o sha no
#                                          versions.json e gera
#
# O .thrift guardado é o gerador da versão: alterações feitas nele (campos que o upstream ainda não publicou)
# valem mais que o sha do upstream. Nenhuma outra versão é alterada. Depois de gerar, rode `php bin/build_versions.php`.

set -euo pipefail

if [ $# -lt 1 ]; then
	echo "uso: bin/generate.sh <versao> [<branch|sha>]" >&2
	exit 1
fi

VERSION="$1"
REF="${2:-}"
ROOT="$(cd "$(dirname "$0")/.." && pwd)"
FOLDER="V${VERSION//./_}"
SOURCE="$ROOT/thrift/$FOLDER"
UPSTREAM="${UPSTREAM:-https://github.com/laboratoriobridge/esusab-integracao}"
UPSTREAM_BRANCH="${UPSTREAM_BRANCH:-master}"
LAYOUTS=(layout-camada-transport layout-ras layout-cidadao)

if ! [[ "$VERSION" =~ ^[0-9]+\.[0-9]+\.[0-9]+$ ]]; then
	echo "Versão inválida: $VERSION" >&2
	exit 1
fi

WORK="$(mktemp -d)"
trap 'rm -rf "$WORK"' EXIT

if [ -n "$REF" ]; then
	git clone --quiet --single-branch --branch "$UPSTREAM_BRANCH" "$UPSTREAM" "$WORK/esusab"
	SHA="$(git -C "$WORK/esusab" rev-parse --verify "origin/$REF^{commit}" 2>/dev/null || git -C "$WORK/esusab" rev-parse --verify "$REF^{commit}")"
	git -C "$WORK/esusab" checkout --quiet "$SHA"

	rm -rf "$SOURCE"
	for layout in "${LAYOUTS[@]}"; do
		mkdir -p "$SOURCE/$layout"
		cp "$WORK"/esusab/thrift/$layout/thrift/*.thrift "$SOURCE/$layout/"
	done

	CIDADAO_IDL="$SOURCE/layout-cidadao/cidadao_transport.thrift"
	if ! grep -q '^namespace php ' "$CIDADAO_IDL"; then
		sed -i '1s/^/namespace php br.gov.saude.esus.thrift.definition.cidadao\n/' "$CIDADAO_IDL"
	fi

	php "$ROOT/bin/build_versions.php" register "$VERSION" "$REF" "$SHA" "0.19.0"
fi

if [ ! -d "$SOURCE" ]; then
	echo "Sem $SOURCE. Informe a branch ou o sha do upstream para criá-lo." >&2
	exit 1
fi

THRIFT="$(php "$ROOT/bin/build_versions.php" get "$VERSION" thrift)"
if [ -z "$THRIFT" ]; then
	echo "A versão $VERSION não está no versions.json." >&2
	exit 1
fi

cp -r "$SOURCE" "$WORK/idl"

for layout in "${LAYOUTS[@]}"; do
	for file in "$WORK"/idl/$layout/*.thrift; do
		if ! grep -q '^namespace php ' "$file"; then
			echo "Sem 'namespace php' em $file" >&2
			exit 1
		fi

		sed -i "s/^namespace php \(.*\)$/namespace php Sysvale.Ras.$FOLDER.\1/" "$file"
	done
done

mkdir -p "$WORK/out"

for layout in "${LAYOUTS[@]}"; do
	for file in "$WORK"/idl/$layout/*.thrift; do
		docker run --rm --user "$(id -u):$(id -g)" -v "$WORK:$WORK" "ghcr.io/sysvale/ras/thrift:$THRIFT" thrift -o "$WORK/out" --gen php "$file" > "$WORK/thrift.log" 2>&1 || { cat "$WORK/thrift.log" >&2; exit 1; }
	done
done

rm -rf "$ROOT/src/$FOLDER"
mkdir -p "$ROOT/src/$FOLDER"
cp -r "$WORK/out/gen-php/Sysvale/Ras/$FOLDER/." "$ROOT/src/$FOLDER/"

echo "Gerado src/$FOLDER a partir de thrift/$FOLDER. Rode: php bin/build_versions.php"
