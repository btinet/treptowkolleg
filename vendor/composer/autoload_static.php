<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7dcc989c3ed095f3c4e4a96bfde1b064
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'ParsedownExtra' => 
            array (
                0 => __DIR__ . '/..' . '/erusev/parsedown-extra',
            ),
            'Parsedown' => 
            array (
                0 => __DIR__ . '/..' . '/erusev/parsedown',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7dcc989c3ed095f3c4e4a96bfde1b064::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7dcc989c3ed095f3c4e4a96bfde1b064::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit7dcc989c3ed095f3c4e4a96bfde1b064::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit7dcc989c3ed095f3c4e4a96bfde1b064::$classMap;

        }, null, ClassLoader::class);
    }
}