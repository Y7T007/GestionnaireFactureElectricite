<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit34c36c05260b7e8e8b2fbced22e7ef39
{
    public static $prefixesPsr0 = array (
        'B' => 
        array (
            'Bramus' => 
            array (
                0 => __DIR__ . '/..' . '/bramus/router/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit34c36c05260b7e8e8b2fbced22e7ef39::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit34c36c05260b7e8e8b2fbced22e7ef39::$classMap;

        }, null, ClassLoader::class);
    }
}
