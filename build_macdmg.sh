#!/bin/bash

if [ ! -d binaries ]; then
	./build_macapp.sh
fi

if [ ! -d binaries/Jeopardy ]; then
	mkdir binaries/Jeopardy
	ln -s /Applications/ binaries/Jeopardy/Applications
fi

cp -r binaries/Jeopardy.app binaries/Jeopardy/.
mkdir binaries/Jeopardy/.background
cp macosx_app/dmg_background.jpg binaries/Jeopardy/.background/background.jpg

cp macosx_app/Vagrant.pkg binaries/Jeopardy/.
cp macosx_app/VirtualBox.pkg binaries/Jeopardy/.
cp macosx_app/DS_Store binaries/Jeopardy/.DS_Store
cp macosx_app/Readme.pdf binaries/Jeopardy/.

hdiutil create binaries/Jeopardy_latest.dmg -srcfolder binaries/Jeopardy