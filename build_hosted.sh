#!/bin/bash

if [ ! -d binaries ]; then
	mkdir binaries
fi

if [ -d binaries/jeopardy ]; then
	rm -rf binaries/jeopardy
fi

cp -r src binaries/jeopardy

if [ -f binaries/jeopardy_latest.tar.gz ]; then
	rm binaries/jeopardy_latest.tar.gz
fi

cd binaries/jeopardy
tar -zcvf ../jeopardy.tar.gz ./
cd ../
rm -rf jeopardy