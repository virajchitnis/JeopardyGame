#!/bin/bash

if [ ! -d binaries ]; then
	mkdir binaries
fi

if [ -d binaries/Jeopardy.app ]; then
	rm -rf binaries/Jeopardy.app
fi

mkdir -p binaries/Jeopardy.app/Contents/MacOS
mkdir -p binaries/Jeopardy.app/Contents/Resources

cp macosx_app/Jeopardy.sh binaries/Jeopardy.app/Contents/MacOS/Jeopardy
cp macosx_app/Jeopardy.command binaries/Jeopardy.app/Contents/MacOS/.
cp macosx_app/jeopardy.icns binaries/Jeopardy.app/Contents/Resources/.
cp macosx_app/Info.plist binaries/Jeopardy.app/Contents/.

cp vagrant/bootstrap.sh binaries/Jeopardy.app/Contents/MacOS/.
cp vagrant/Vagrantfile binaries/Jeopardy.app/Contents/MacOS/.

cp -r src binaries/Jeopardy.app/Contents/MacOS/.