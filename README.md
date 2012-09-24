eVias' dev-box
=======================

Introduction
------------
This is a web development toolbox application using the ZF2 MVC layer and module
systems. Any web development process / pattern can get a useful implementation
in this toolbox. Example tool modules include:
    - GET / POST / PUT request handler
    - SOAP request handler
        * WSDL tools
    - XML/RPC request handler
    - More to come..

Unitary testing
---------------
Every unit of the dev-box should be covered by a unitary test. A unit is, intuitively,
the smallest testable part of an application. Test cases should be independent from others
while base data structures may be defined and PHPUnit' dataProvider feature HAS TO BE used.

Dependencies
------------
This application is based on the ZF2 Skeletton application available from http://framework.zend.com.
Composer can be used to configure the repository dependencies such that the composer.phar file is used
for the installation.

Installation
------------

Using Git submodules
--------------------
You can install using native git submodules:
    $ git clone git://github.com/evias/dev-box.git --recursive

Configure repository
--------------------
You have to configure your repository clone's dependencies such that ZF2 is available.
    $ php composer.phar install

Virtual Host
------------
Afterwards, set up a virtual host to point to the public/ directory of the
project and you should be ready to go!
