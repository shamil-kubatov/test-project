<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0eed0f812edce6f23db5432b0df27b6d
{
    public static $prefixLengthsPsr4 = array (
        'i' => 
        array (
            'ishop\\' => 6,
        ),
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'ishop\\' => 
        array (
            0 => __DIR__ . '/..' . '/ishop/core',
        ),
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0eed0f812edce6f23db5432b0df27b6d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0eed0f812edce6f23db5432b0df27b6d::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
