Prerequisites
=============

- PHP 7.2
- some basic PHP extensions, required mostly by Symfony: ctype, iconv, intl, json, mbstring, zip, mysql
- mysql server 
- for quick bootstrap, prepare 'elastique' user, identified by 'elastique' password with full access to 'elastique' database
- composer

Installation
============

- composer install
- bin/console d:d:c
- bin/console d:migration:m --no-interaction
- bin/console d:f:l

Tests
=====

- bin/phpunit
