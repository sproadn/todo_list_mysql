<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite0c27049d44aed9c0878951d8ad648f3
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

    public static $classMap = array (
        'App\\Model' => __DIR__ . '/../..' . '/src/Model.php',
        'App\\Todo' => __DIR__ . '/../..' . '/src/Todo.php',
        'App\\User' => __DIR__ . '/../..' . '/src/User.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite0c27049d44aed9c0878951d8ad648f3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite0c27049d44aed9c0878951d8ad648f3::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite0c27049d44aed9c0878951d8ad648f3::$classMap;

        }, null, ClassLoader::class);
    }
}
