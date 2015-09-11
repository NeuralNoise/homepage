<?php

namespace egl\website;

//TODO: Should this file and autoload.php be here?

$loader = new autoload();
$lodaer->register;
$loader->addNamespace('egl\website', '/var/egl/');
$loader->addNamespace('egl\website', '/var/egl/src/');
$loader->addNamespace('egl\website\test', '/var/egl/test');