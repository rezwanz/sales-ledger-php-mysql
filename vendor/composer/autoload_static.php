<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit245ee5965168ef49443f755613896f57
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
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit245ee5965168ef49443f755613896f57::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit245ee5965168ef49443f755613896f57::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit245ee5965168ef49443f755613896f57::$classMap;

        }, null, ClassLoader::class);
    }
}
