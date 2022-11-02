<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita756d08b0fdc25609abbd75394ffc5f2
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Core\\' => 5,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita756d08b0fdc25609abbd75394ffc5f2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita756d08b0fdc25609abbd75394ffc5f2::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita756d08b0fdc25609abbd75394ffc5f2::$classMap;

        }, null, ClassLoader::class);
    }
}