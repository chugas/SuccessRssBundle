SuccessRssBundle
==================

Integrates [SimplePie](https://github.com/simplepie/simplepie) RSS Parser into Symfony2 and setting up caching to the symfony2 cache folder.

Installation
============

Bring in the vendor libraries
-----------------------------

This can be done in two different ways:

Use composer

    "require": {
        "success/rss-bundle": "1.0.*"
    }


Add SimplePieBundle to your application kernel
----------------------------------------------
	
    // app/AppKernel.php
    public function registerBundles()
    {
        return array(
            // ...
            new Success\RssBundle\SuccessRssBundle(),
            // ...
        );
    }


Configuration
=============

    # app/config.yml
    success_simple_pie:
        cache_enabled: false
        cache_dir: %kernel.cache_dir%/rss
        cache_duration: 3600


* cache_enabled: [true or false] enables caching for the SimplePie class
* cache_dir: [any dir] setup the caching dir which SimplePie should use
* cache_duration: [secs] setting up caching for number of seconds.

For more information about SimplePie's caching please visit the [SimplePie wiki](http://simplepie.org/wiki/faq/how_does_simplepie_s_caching_http_conditional_get_system_work).


Usage
=====

To get a configured SimplePie class instance just use the following code

	$this->get('success_simple_pie.rss');

The service keeps only one instance of SimplePie. If you want to use multiple feeds over your application you have to `clone` the instance to stop them interfering

	$one = clone $this->get('success_simple_pie.rss');
	$two = clone $this->get('success_simple_pie.rss');
	
For the complete api visit the [SimplePie api doc](http://simplepie.org/wiki/reference/start).
