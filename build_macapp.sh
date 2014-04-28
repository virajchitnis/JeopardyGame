#!/bin/bash

if [ ! -d binaries ]; then
	mkdir binaries
fi

if [ -d binaries/Jeopardy.app ]; then
	rm -rf binaries/Jeopardy.app
fi

mkdir -p binaries/Jeopardy.app/Contents/MacOS
cp Jeopardy.sh binaries/Jeopardy.app/Contents/MacOS/Jeopardy

cp Jeopardy.command binaries/Jeopardy.app/Contents/MacOS/.
cp bootstrap.sh binaries/Jeopardy.app/Contents/MacOS/.
cp Vagrantfile binaries/Jeopardy.app/Contents/MacOS/.

cp -r src binaries/Jeopardy.app/Contents/MacOS/.