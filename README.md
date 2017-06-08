# Xdebug Demo

![xdebug-logo](https://upload.wikimedia.org/wikipedia/en/5/5e/Xdebug-logo.png)

A demo outlining the benefits of using Xdebug on your typical PHP development workflow.


# Requirements

1. PHP v5.6++ w/ Xdebug installed.
1. An IDE that supports Xdebug. This demo uses [PHPStorm](https://www.jetbrains.com/phpstorm/).
1. Google Chrome w/ the [Xdebug helper](https://chrome.google.com/webstore/detail/xdebug-helper/eadndfjplgieldjbigjakmdgkmoaaaoc?hl=en) extension installed.
1. Shell access.


# Installation

To get started with this project, run:

    composer create-project \
    --prefer-source \
    --stability=dev \
    jpcaparas/xdebug-demo \
    [dir-name]
    
---

Once cloned, run tests to ensure everything is intact:

    ./vendor/bin/codecept run
    
    
---

Xdebug might already be installed on your machine; to find out, run:

    php -v
    
... which should result in an output similar to this:

    PHP 7.1.5 (cli) (built: May 13 2017 13:30:32) ( NTS )
    Copyright (c) 1997-2017 The PHP Group
    Zend Engine v3.1.0, Copyright (c) 1998-2017 Zend Technologies
        with Xdebug v2.5.1, Copyright (c) 2002-2017, by Derick Rethans


If you don't have the `with Xdebug...` line, you'll have to download, enable, and configure the Xdebug extension.

Atlassian has a good, [multi-platform guide on how to install Xdebug](https://confluence.jetbrains.com/display/PhpStorm/Xdebug+Installation+Guide).


# Usage

_Coming soon..._


# Resources

_Coming soon..._


# Gotchas

> `composer` has become slower following Xdebug's installation. Is it possible to disable Xdebug on `composer` usage?
 
Yes, append this nifty script on your `~/.bash_aliases` file (or its equivalent):

    alias composer="php -n -d memory_limit=-1 $(which composer)"

The `-n` flag effectively disables PHP from reading the `php.ini` file (where Xdebug is defined).


# Attributions

This demo is part of [Pixel Fusion](https://pixelfusion.co.nz) _Engineering Talks_ held every Friday, wherein we showcase tools and methodologies that empower developer productivity.
