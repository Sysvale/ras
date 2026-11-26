#!/usr/bin/env bash
#
# Gera as classes PHP de UMA versão do schema RAS em src/V<x_y_z>/.
#
#   bin/generate.sh <versao>               reproduz a versão a partir do SHA do versions.json
#   bin/generate.sh <versao> <branch|sha>  gera uma versão nova e registra o SHA no versions.json
#
# Nenhuma outra versão é alterada. Depois de gerar, rode `php bin/build_versions.php`.

set -euo pipefail

if [ $# -lt 1 ]; then
	echo "uso: bin/generate.sh <versao> [<branch|sha>]" >&2
	exit 1
fi

VERSION="$1"
REF="${2:-}"
ROOT="$(cd "$(dirname "$0")/.." && pwd)"
FOLDER="V${VERSION//./_}"
UPSTREAM="${UPSTREAM:-https://github.com/laboratoriobridge/esusab-integracao}"
UPSTREAM_BRANCH="${UPSTREAM_BRANCH:-master}"

if ! [[ "$VERSION" =~ ^[0-9]+\.[0-9]+\.[0-9]+$ ]]; then
	echo "Versão inválida: $VERSION" >&2
	exit 1
fi

WORK="$(mktemp -d)"
trap 'rm -rf "$WORK"' EXIT

git clone --quiet --single-branch --branch "$UPSTREAM_BRANCH" "$UPSTREAM" "$WORK/esusab"

if [ -n "$REF" ]; then
	SHA="$(git -C "$WORK/esusab" rev-parse --verify "origin/$REF^{commit}" 2>/dev/null || git -C "$WORK/esusab" rev-parse --verify "$REF^{commit}")"
	BRANCH="$REF"
	THRIFT="0.19.0"
else
	SHA="$(php "$ROOT/bin/build_versions.php" get "$VERSION" sha)"
	BRANCH="$(php "$ROOT/bin/build_versions.php" get "$VERSION" branch)"
	THRIFT="$(php "$ROOT/bin/build_versions.php" get "$VERSION" thrift)"

	if [ -z "$SHA" ]; then
		echo "A versão $VERSION não tem sha no versions.json. Informe a branch ou o sha do upstream." >&2
		exit 1
	fi
fi

git -C "$WORK/esusab" checkout --quiet "$SHA"

CIDADAO_IDL="$WORK/esusab/thrift/layout-cidadao/thrift/cidadao_transport.thrift"
if ! grep -q '^namespace php ' "$CIDADAO_IDL"; then
	sed -i '1s/^/namespace php br.gov.saude.esus.thrift.definition.cidadao\n/' "$CIDADAO_IDL"
fi

for layout in layout-camada-transport layout-ras layout-cidadao; do
	for file in "$WORK"/esusab/thrift/$layout/thrift/*.thrift; do
		if ! grep -q '^namespace php ' "$file"; then
			echo "Sem 'namespace php' em $file" >&2
			exit 1
		fi

		sed -i "s/^namespace php \(.*\)$/namespace php Sysvale.Ras.$FOLDER.\1/" "$file"
	done
done

mkdir -p "$WORK/out"

for layout in layout-camada-transport layout-ras layout-cidadao; do
	for file in "$WORK"/esusab/thrift/$layout/thrift/*.thrift; do
		docker run --rm --user "$(id -u):$(id -g)" -v "$WORK:$WORK" "ghcr.io/sysvale/ras/thrift:$THRIFT" thrift -o "$WORK/out" --gen php "$file" > "$WORK/thrift.log" 2>&1 || { cat "$WORK/thrift.log" >&2; exit 1; }
	done
done

rm -rf "$ROOT/src/$FOLDER"
mkdir -p "$ROOT/src/$FOLDER"
cp -r "$WORK/out/gen-php/Sysvale/Ras/$FOLDER/." "$ROOT/src/$FOLDER/"

if [ -n "$REF" ]; then
	php "$ROOT/bin/build_versions.php" register "$VERSION" "$BRANCH" "$SHA" "$THRIFT"
fi

echo "Gerado src/$FOLDER a partir de $SHA. Rode: php bin/build_versions.php"
