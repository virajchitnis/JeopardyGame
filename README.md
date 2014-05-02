Jeopardy! by Viraj Chitnis
==========================
Try out a working copy of this game at [jeopardy.virajchitnis.com](http://jeopardy.virajchitnis.com).

The Jeopardy! game is a web application that can be used by professors, instructors, teachers, etc as a fun review session in class. It was developed to replace a badly designed, Windows only Jeopardy game that one of my professors was using in class. The professor has now switched to using this on their Mac.

This is a web application originally designed to be hosted on a standalone web server. But because of the hassles of setting up such a server and making sure that the web application works in whatever server environment has been set up. It is much more user intuitive to have the web application run as a pseudo application on any computer.

The Jeopardy Mac app now simply creates a virtual environment with a LAMP (Linux, Apache, MySQL, PHP) server on the fly and enables port forwarding so that the web application can be accessed at [http://localhost:8080](http://localhost:8080). It then opens this link in the default web browser. If your default web browser happens to be anything other than Safari or Google Chrome, please open the above link in one of those browsers as they are the recommended and tested browsers.

When the game is started, it may take a few minutes for the virtual environment to initialize because the application is actually creating and installing a virtual machine in the background.

On its first run (after installation or updating), the virtual environment will take longer than usual to initialize because it has to download the virtual environment root disk image and then create the virtual environment. On subsequent runs, it will be much faster because the downloaded root disk image will be saved and reused.

This game is finally a web app, so even though it has been packaged as a Mac application, it can still be installed as a hosted web application on any AMP server (LAMP, WAMP, MAMP, etc). The instructions for doing so are included below.

Installation for any LAMP server (recommended)
----------------------------------------------

The installation instructions here are very generic and may need to be tailored specifically for your server setup.

Requirements

* Apache 2.2+
* MySQL 5+
* PHP 5+

Download [Jeopardy-2.2.tar.gz](https://github.com/virajchitnis/JeopardyGame/releases/download/v2.2/Jeopardy-2.2.tar.gz)

1. Download and untar the tar.gz file to your Apache server root, the command may look something like this '*tar -zxvf Jeopardy-2.2.tar.gz*'.
2. Change the owner of the extracted folder to your Apache server user, 'apache' or 'www-data', depending upon your linux distro.
3. Create a database and corresponding user in MySQL.
4. Import the database template into the MySQL database, command may look something like this '*mysql -u username -p'password' database_name < scripts/database.sql*'.
5. Modify the '*config/config.php*' file to match your database parameters.
6. Visit your jeopardy game folder on your server via the browser and enjoy.
7. (Optional step) If you want to use Google Analytics to track your site usage. Modify the '*common/googleanalytics_template.php*' to match your google analytics tracking code and move that file to '*common/googleanalytics.php*'.

Installation for Mac OS X 10.8+
-------------------------------

Requirements

* VirtualBox 4.3.10 (with corresponding extenstions pack)
* Vagrant 1.5.4+

Download [Jeopardy-2.2.dmg](https://github.com/virajchitnis/JeopardyGame/releases/download/v2.2/Jeopardy-2.2.dmg)

1. If you do not have VirtualBox or Vagrant installed, install them.
2. Download and open the disk image.
3. Drag the Jeopardy app icon to the ‘Applications’ icon.
4. Close the disk image window and open your ‘Applications’ folder.
5. Open the Jeopardy app. If OS X complains about the app not being downloaded from the Mac App Store, right click (two finger click) on the ‘Jeopardy’ application and select ‘Open’ and then select ‘Open’ again from the prompt.

OS support
----------

* Mac OS X 10.8+
* AMP (Apache, MySQL, PHP) server

Changelog
---------

Version 2.2

* Ability to add your own google analytics code (hosted version only)
* Open source project info in the footer

Version 2.1

* Ability to delete games
* Ability to edit previously created games
* Hosted version of game that can be installed on a LAMP server
* Some major and some minor bug fixes

Version 2.0

* Converted the game to a Mac application

License
-------

This application is available under the [MIT License](https://github.com/virajchitnis/JeopardyGame/blob/master/LICENSE.md)

Support
-------

If you happen to find any bugs in this game, or have a feature request, please create an issue for it on the  [GitHub](https://github.com/virajchitnis/JeopardyGame) page. Please also mark the issue appropriately, so if you have discovered a bug, mark the issue as a 'bug', if you have a feature request, mark the issue as an 'enhancement'.