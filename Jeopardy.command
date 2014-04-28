#!/bin/bash

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
echo "3. Exit"

tput bold
tput cup 12 15
read -p "Enter your choice [1-3] " CHOICE

tput clear
tput sgr0
tput rc

if [ ${CHOICE} == 1 ]; then
	clear
	echo -n "Initializing virtual environment....."
	echo "Done"
	echo -n "Starting the game in the default web browser....."
	echo "Done"
elif [ ${CHOICE} == 2 ]; then
	echo "You can either enter a location manually, or just simply drag and drop your data file from the Finder."
	echo "Enter data location: "
	read LOCATION
	echo ${LOCATION}
else
	echo "Closing the application....."
	# Do nothing
fi