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

Once cloned, run tests to ensure everything is intact:

    ./vendor/bin/codecept run


# Usage

_Coming soon..._


# Resources

_Coming soon..._


# Gotchas

> `composer` has become slower following Xdebug's installation. Is it possible to disable Xdebug on `composer` usage?
 
Yes, append this nifty script on your `~/.bash_aliases` file (or its equivalent):

    alias composer="php -n -d memory_limit=-1 $(which composer)"

The `-n` flag effectively disables PHP from reading the `php.ini` file (where Xdebug is defined).

---


# Attributions

_Coming soon..._
