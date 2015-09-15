<?php

namespace egl\website;

//TODO: Should this file and autoload.php be here?

$loader = new autoload();
$loader->register();
$loader->addNamespace('egl\website', '/var/egl/');
$loader->addNamespace('egl\website', '/var/egl/src/');
$loader->addNamespace('egl\website\test', '/var/egl/test');
$loader->addNamespace('', '/var/egl/lib');