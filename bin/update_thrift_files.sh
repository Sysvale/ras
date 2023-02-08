#!/bin/bash
git clone https://github.com/laboratoriobridge/esusab-integracao storage/esusab || true

if ! grep "namespace php br.gov.saude.esus.thrift.definition.cidadao" storage/esusab/thrift/layout-cidadao/thrift/cidadao_transport.thrift ; then
	sed -i '1s/^/namespace php br.gov.saude.esus.thrift.definition.cidadao\n/' storage/esusab/thrift/layout-cidadao/thrift/cidadao_transport.thrift
fi

layouts=(
	'layout-camada-transport'
	'layout-ras'
	'layout-cidadao'
)

mapped_directories=(
	'transport'
	'cds'
	'cidadao'
)

size=$((${#layouts[@]}))

for (( i=0; i<$size; i++ ))
do
	for FILE in storage/esusab/thrift/${layouts[$i]}/thrift/*.thrift
	do
		mkdir -p src/${mapped_directories[$i]}
		docker run -v "$PWD:$(pwd)" sysvale-thrift:0.17.0 thrift -o "$(pwd)/src/${mapped_directories[$i]}" --gen php -v $(pwd)/$FILE
	done
done

rm -f storage/esusab -R
