#!/bin/bash

if [ ! -d binaries/Jeopardy.app ]; then
	./build_macapp.sh
fi

if [ ! -d binaries/Jeopardy ]; then
	mkdir binaries/Jeopardy
	ln -s /Applications/ binaries/Jeopardy/Applications
fi

mv binaries/Jeopardy.app binaries/Jeopardy/.
mkdir binaries/Jeopardy/.background
cp macosx_app/JeopardyDMG_Background_Small.jpg binaries/Jeopardy/.background/background.jpg

cp macosx_app/DS_Store binaries/Jeopardy/.DS_Store
pandoc -o binaries/Jeopardy/README.html README.md

if [ -f binaries/Jeopardy_latest.dmg ]; then
	rm binaries/Jeopardy_latest.dmg
fi

hdiutil create binaries/Jeopardy_latest.dmg -srcfolder binaries/Jeopardy
rm -r binaries/Jeopardy