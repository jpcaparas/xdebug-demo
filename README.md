# Xdebug Demo

![xdebug-logo](https://upload.wikimedia.org/wikipedia/en/5/5e/Xdebug-logo.png)

A demo outlining the benefits of using Xdebug on your typical PHP development workflow.


# Requirements

1. PHP v5.6++ w/ Xdebug installed.
1. An IDE that supports Xdebug. This demo uses [PhpStorm](https://www.jetbrains.com/phpstorm/).
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

## Wiring everything up

Once you have Xdebug configured, mark breakpoints throughout your code base:

![Mark breakpoints](http://i.imgur.com/Scuv8yLl.jpg)

Upon marking, ensure that your IDE has been set up to become a debug client.

![Listen for incoming connections](http://i.imgur.com/K52Ufz6m.png)

... and allow the browser to connect to the client.

![Chrome browser extension](http://i.imgur.com/jwtbq2Xm.png)

Now spin up a built-in web server from the terminal and we'll start debugging:

    php -S localhost:8000 -t public
    

## Connecting to the debug client
    
Open your browser on `http://localhost:8000`. You should see a form that asks for a GitHub username.

Assuming that you have added breakpoints to the `./src/Services/GitHubService.php` file, your should be able to breakpoint into the code upon sending the `POST` request.

If the connection was successful, you'll be taken to the `Debugger` pane on PhpStorm, where you'll see a lot of stuff going on:

![](http://i.imgur.com/AKMD6Ahl.jpg)

At this point, all you need to do is familiarise yourself with the various commands at your disposal (e.g. frames, variables, console, stepping).

More information about the various Debugger features can be seen [here](https://confluence.jetbrains.com/display/PhpStorm/Zero-configuration+Web+Application+Debugging+with+Xdebug+and+PhpStorm).


# Gotchas

> `composer` has become slower following Xdebug's installation. Is it possible to disable Xdebug on `composer` usage?
 
Yes, append this nifty script on your `~/.bash_aliases` file (or its equivalent):

    alias composer="php -n -d memory_limit=-1 $(which composer)"

The `-n` flag effectively disables PHP from reading the `php.ini` file (where Xdebug is defined).

# Resources

_Coming soon..._


# Attributions

This demo is part of [Pixel Fusion](https://pixelfusion.co.nz) _Engineering Talks_ held every Friday, wherein we showcase tools and methodologies that empower developer productivity.
