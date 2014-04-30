Jeopardy! by Viraj Chitnis
==========================

This Jeopardy! game is a web application originally designed to be hosted on a standalone web server. But because of the hassles of setting up such a server and making sure that the web application works in whatever server environment has been set up. It is much more user intuitive to have the web application run as a pseudo application on any computer.

The Jeopardy application now simply creates a virtual environment with a LAMP (Linux, Apache, MySQL, PHP) server and enables port forwarding so that the web application can be accessed at [http://localhost:8080](http://localhost:8080). It then opens this link in the default web browser. If your default web browser happens to be anything other than Safari or Google Chrome, please open the above link in one of those browsers as they are the recommended and tested browsers.

When the game is started, it may take a few minutes for the virtual environment to initialize because the application is actually creating and installing a virtual machine in the background.

On its first run (after installation or updating), the virtual environment will take longer than usual to initialize because it has to download the virtual environment root disk image and then create the virtual environment. On subsequent runs, it will be much faster because the downloaded root disk image will be saved and reused.

Installation for Mac OS X 10.8+
-------------------------------

1. Download and open the disk image.
2. Drag the Jeopardy app icon to the ‘Applications’ icon.
3. Close the disk image window and open your ‘Applications’ folder.
4. Open the Jeopardy app. If OS X complains about the app not being downloaded from the Mac App Store, right click (two finger click) on the ‘Jeopardy’ application and select ‘Open’ and then select ‘Open’ again from the prompt.

Installation for any LAMP server
--------------------------------

The installation instructions here are very generic and may need to be tailored specifically for your server setup.

OS support
----------

*Mac OS X 10.8+ (requires a working copy of VirtualBox 4.1+ and Vagrant 1.5.4+)
*AMP (Apache, MySQL, PHP) server