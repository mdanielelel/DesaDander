<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf9448bf3c508d24147ee5bc1225fb5d0
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitf9448bf3c508d24147ee5bc1225fb5d0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf9448bf3c508d24147ee5bc1225fb5d0::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf9448bf3c508d24147ee5bc1225fb5d0::$classMap;

        }, null, ClassLoader::class);
    }
}
