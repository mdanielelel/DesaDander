<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5146d88e70e78fed09b7e49620ee97ef
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'AIOSEO\\Plugin\\Extend\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'AIOSEO\\Plugin\\Extend\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5146d88e70e78fed09b7e49620ee97ef::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5146d88e70e78fed09b7e49620ee97ef::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit5146d88e70e78fed09b7e49620ee97ef::$classMap;

        }, null, ClassLoader::class);
    }
}
