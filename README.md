Jeopardy! by Viraj Chitnis
==========================

This Jeopardy! game is a web application originally designed to be hosted on a standalone web server. But because of the hassles of setting up such a server and making sure that the web application works in whatever server environment has been set up. It is much more user intuitive to have the web application run as a pseudo application on any computer.

The Jeopardy application now simply creates a virtual environment with a LAMP (Linux, Apache, MySQL, PHP) server and enables port forwarding so that the web application can be accessed at [http://localhost:8080](http://localhost:8080). It then opens this link in the default web browser. If your default web browser happens to be anything other than Safari or Google Chrome, please open the above link in one of those browsers as they are the recommended and tested browsers.

When the game is started, it may take a few minutes for the virtual environment to initialize because the application is actually creating and installing a virtual machine in the background.

On its first run (after installation or updating), the virtual environment will take longer than usual to initialize because it has to download the virtual environment root disk image and then create the virtual environment. On subsequent runs, it will be much faster because the downloaded root disk image will be saved and reused.

Requirements
------------

* VirtualBox 4.1+ (with corresponding extenstions pack)
* Vagrant 1.5.4+

Installation for Mac OS X 10.8+
-------------------------------

Download [Jeopardy-2.1.dmg](https://github.com/virajchitnis/JeopardyGame/releases/download/v2.1/Jeopardy-2.1.dmg)

1. Download and open the disk image.
2. Drag the Jeopardy app icon to the ‘Applications’ icon.
3. Close the disk image window and open your ‘Applications’ folder.
4. Open the Jeopardy app. If OS X complains about the app not being downloaded from the Mac App Store, right click (two finger click) on the ‘Jeopardy’ application and select ‘Open’ and then select ‘Open’ again from the prompt.

Installation for any LAMP server
--------------------------------

The installation instructions here are very generic and may need to be tailored specifically for your server setup.

Download [Jeopardy-2.1.tar.gz](https://github.com/virajchitnis/JeopardyGame/releases/download/v2.1/Jeopardy-2.1.tar.gz)

1. Download and untar the tar.gz file to your Apache server root, the command may look something like this 'tar -zxvf Jeopardy-2.1.tar.gz'.
2. Change the owner of the extracted folder to your Apache server user, 'apache' or 'www-data', depending upon your linux distro.
3. Create a database and corresponding user in MySQL.
4. Import the database template into the MySQL database, command may look something like this 'mysql -u username -p'password' database_name < scripts/database.sql'.
5. Modify the config/config.php file to match your database parameters.
6. Visit your jeopardy game folder on your server via the browser and enjoy.

OS support
----------

* Mac OS X 10.8+
* AMP (Apache, MySQL, PHP) server

Changelog
---------

Version 2.1

* Ability to delete games
* Ability to edit previously created games
* Hosted version of game that can be installed on a LAMP server
* Some major and some minor bug fixes

Version 2.0

* Converted the game to a Mac application