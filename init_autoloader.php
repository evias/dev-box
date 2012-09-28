<?php

/**
 *  @package    eVias.dev-box
 *  @category   Core
 *  @author     Grégory Saive <saive.gregory@gmail.com>
 *  @brief:
 *      This file is automatically generated by Zend' Composer.
 *      Though it has been modified to avoid "newbies-trickery",
 *      as ZF is very newbie-friendly I thought to disable the
 *      the complexity of the ZF autoloader redefinition.
 *      A simple ComposerAutoloader is used which initializes
 *      ZF namespace resolution.
 */

if (file_exists('vendor/autoload.php')) {
    $loader = include 'vendor/autoload.php';
}

if (!class_exists('Zend\Loader\AutoloaderFactory')) {
    throw new RuntimeException('Unable to load ZF2. Run `php composer.phar install` or define a ZF2_PATH environment variable.');
}

$loader = new Zend\Loader\StandardAutoloader( array(
    "namespaces" => array(
        "core"  => __DIR__ . "/core",),
    "fallback_autoloader" => false));
$loader->register();

