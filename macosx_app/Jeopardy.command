#!/bin/bash

function saveToLibrary {
	echo -n "Saving user data....."
	
	if [ -f "savedata.sql" ]; then
		if [ ! -d "${SAVELOC}" ]; then
			mkdir -p "${SAVELOC}"
		fi
		if [ -f "${SAVEDATA}" ]; then
			if [ ! cmp -s "savedata.sql" "${SAVEDATA}" ]; then
				CURRDATE=$(date +"%Y-%m-%d-%H-%M-%S")
				mv "${SAVEDATA}" "${SAVELOC}/savedata-${CURRDATE}.sql"
				cp savedata.sql "${SAVEDATA}"
			fi
		else
			cp savedata.sql "${SAVEDATA}"
		fi
	fi
	echo "Done"
}

function closeApp {
	saveToLibrary
	echo "Closing the application....."
	# Do nothing
	clear
	
	echo "Exited, you may now close this window"
	echo " "
}

function startGame {
	tput clear

	tput cup 3 15

	tput setaf 3
	echo "Jeopardy! by Viraj Chitnis"
	tput sgr0

	tput cup 5 17

	tput rev
	echo "G A M E - M E N U"
	tput sgr0

	tput cup 7 15
	echo -n "Initializing virtual environment....."
	vagrant up > /dev/null
	echo "Done"

	tput cup 8 15
	echo -n "Starting the game in the default web browser....."
	open "http://localhost:8080"
	echo "Done"
	
	tput bold
	tput cup 12 15
	read -p "Press 'Enter' a.k.a 'Carriage Return' to exit" QUIT
	tput sgr0
	tput cup 13 15
	echo -n "Closing virtual environment....."
	vagrant destroy -f > /dev/null
	echo "Done"
	
	tput clear
	tput sgr0
	tput rc
	
	closeApp
}

function importData {
	if [[ ${1: -5} == ".jeop" ]]; then
		echo -n "Importing game data....."
		cp ${1} savedata.jeop
		gunzip -S .jeop savedata.jeop
		mv savedata savedata.sql
		echo "Done"
		saveToLibrary
	else
		echo "Invalid file type, only files with .jeop extension are accepted."
		echo "Try again"
		echo "Datafile location: "
		read LOCATION
		importData ${LOCATION}
	fi
}

# Check if Vagrant and VirtualBox are installed, if not, exit
if [ ! -f /usr/bin/VBoxManage ]; then
	echo "VirtualBox not installed, please install VirtualBox to use this game."
	exit 1
fi
if [ ! -f /usr/bin/vagrant ]; then
	echo "Vagrant not installed, please install Vagrant to use this game."
	exit 1
fi

BASEDIR=$(dirname $0)
SAVELOC="/Users/$(whoami)/Library/Preferences/com.virajchitnis.Jeopardy"
SAVEDATA="/Users/$(whoami)/Library/Preferences/com.virajchitnis.Jeopardy/savedata.sql"
cd ${BASEDIR}

if [ -f "${SAVEDATA}" ]; then
	cp "${SAVEDATA}" savedata.sql
fi

tput clear

tput cup 3 15

tput setaf 3
echo "Jeopardy! by Viraj Chitnis"
tput sgr0

tput cup 5 17

tput rev
echo "M A I N - M E N U"
tput sgr0

tput cup 7 15
echo "1. Start game"

tput cup 8 15
echo "2. Import game data"

tput cup 9 15
echo "3. Export game data"

tput cup 10 15
echo "4. Exit"

tput bold
tput cup 12 15
read -p "Enter your choice [1-4] " CHOICE

tput clear
tput sgr0
tput rc

if [ ! ${CHOICE} == "\n" ]; then
	if [ ${CHOICE} == 1 ]; then
		startGame
	elif [ ${CHOICE} == 2 ]; then
		echo "You can either enter a location manually, or just simply drag and drop your data file from the Finder."
		echo "Datafile location: "
		read LOCATION
		importData ${LOCATION}
		
		tput clear

		tput cup 3 15

		tput setaf 3
		echo "Jeopardy! by Viraj Chitnis"
		tput sgr0

		tput cup 5 17

		tput rev
		echo "M A I N - M E N U"
		tput sgr0

		tput cup 7 15
		echo "1. Start game"

		tput cup 8 15
		echo "2. Exit"

		tput bold
		tput cup 12 15
		read -p "Enter your choice [1-2] " CHOICE2

		tput clear
		tput sgr0
		tput rc
		
		if [ ! ${CHOICE2} == "\n" ]; then
			if [ ${CHOICE2} == 1 ]; then
				startGame
			else
				closeApp
			fi
		else
			closeApp
		fi
	elif [ ${CHOICE} == 3 ]; then
		if [ -f savedata.sql ]; then
			echo -n "Exporting game data....."
			cp savedata.sql savedata
			gzip -S .jeop savedata
			mv savedata.jeop ~/Desktop/.
			echo "Done"
		else
			echo "No data to export."
		fi
		
		tput clear

		tput cup 3 15

		tput setaf 3
		echo "Jeopardy! by Viraj Chitnis"
		tput sgr0

		tput cup 5 17

		tput rev
		echo "M A I N - M E N U"
		tput sgr0

		tput cup 7 15
		echo "1. Start game"

		tput cup 8 15
		echo "2. Exit"

		tput bold
		tput cup 12 15
		read -p "Enter your choice [1-2] " CHOICE2

		tput clear
		tput sgr0
		tput rc
		
		if [ ! ${CHOICE2} == "\n" ]; then
			if [ ${CHOICE2} == 1 ]; then
				startGame
			else
				closeApp
			fi
		else
			closeApp
		fi
	else
		closeApp
	fi
else
	closeApp
fi