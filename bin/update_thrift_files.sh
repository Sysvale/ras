#!/bin/bash
git clone https://github.com/laboratoriobridge/esusab-integracao storage/esusab || true

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
		# thrift -o src/bu/${mapped_directories[$i]} --gen php $FILE
		# docker run -v "$PWD:$(pwd)" thrift:0.9.3 thrift -r -o "$(pwd)/src/${mapped_directories[$i]}" --gen php:oop -v $(pwd)/$FILE
		docker run -v "$PWD:$(pwd)" thrift:0.14.1 thrift -o "$(pwd)/src/${mapped_directories[$i]}" --gen php -v $(pwd)/$FILE
	done
done

rm -f storage/esusab -R
