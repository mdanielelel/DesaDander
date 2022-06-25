<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit38ed3b2d495de97d046825284b95da61
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit38ed3b2d495de97d046825284b95da61::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit38ed3b2d495de97d046825284b95da61::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit38ed3b2d495de97d046825284b95da61::$classMap;

        }, null, ClassLoader::class);
    }
}
