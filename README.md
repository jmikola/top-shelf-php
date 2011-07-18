Top Shelf PHP
=============

This is an example application for the [Top Shelf PHP][] presentation at [OSCON 2011][].
It is based on the [Symfony2 Standard Edition][] distribution and includes additional
libraries, such as [Behat][] and [Mink][].

  [Top Shelf PHP]: http://www.oscon.com/oscon2011/public/schedule/detail/18980
  [OSCON 2011]: http://www.oscon.com/oscon2011
  [Symfony2 Standard Edition]: http://github.com/symfony/symfony-standard
  [Behat]: http://github.com/Behat/Behat
  [Mink]: http://github.com/Behat/Mink

Installation
------------

Run the following commands:

    git clone http://github.com/jmikola/top-shelf-php.git
    cd top-shelf-php
    php bin/vendors install

Configuration
-------------

The app's configuration depends on values defined in `app/config/parameters.ini`.
While this file is not included in the repository, you may create it by copying
`app/config/parameters.ini.dist`.
