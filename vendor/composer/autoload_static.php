<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6c2df83a951be25ddbc5c6441480912d
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'Database\\' => 9,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Database\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/Db',
        ),
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit6c2df83a951be25ddbc5c6441480912d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6c2df83a951be25ddbc5c6441480912d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6c2df83a951be25ddbc5c6441480912d::$classMap;

        }, null, ClassLoader::class);
    }
}
