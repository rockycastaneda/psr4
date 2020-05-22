<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit068c407a100451d5d5239a44ca88d87a
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'Rox\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Rox\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'H' => 
        array (
            'Httpful' => 
            array (
                0 => __DIR__ . '/..' . '/nategood/httpful/src',
            ),
        ),
    );

    public static $classMap = array (
        'Httpful\\Bootstrap' => __DIR__ . '/..' . '/nategood/httpful/src/Httpful/Bootstrap.php',
        'Httpful\\Exception\\ConnectionErrorException' => __DIR__ . '/..' . '/nategood/httpful/src/Httpful/Exception/ConnectionErrorException.php',
        'Httpful\\Exception\\JsonParseException' => __DIR__ . '/..' . '/nategood/httpful/src/Httpful/Exception/JsonParseException.php',
        'Httpful\\Handlers\\CsvHandler' => __DIR__ . '/..' . '/nategood/httpful/src/Httpful/Handlers/CsvHandler.php',
        'Httpful\\Handlers\\FormHandler' => __DIR__ . '/..' . '/nategood/httpful/src/Httpful/Handlers/FormHandler.php',
        'Httpful\\Handlers\\JsonHandler' => __DIR__ . '/..' . '/nategood/httpful/src/Httpful/Handlers/JsonHandler.php',
        'Httpful\\Handlers\\MimeHandlerAdapter' => __DIR__ . '/..' . '/nategood/httpful/src/Httpful/Handlers/MimeHandlerAdapter.php',
        'Httpful\\Handlers\\XHtmlHandler' => __DIR__ . '/..' . '/nategood/httpful/src/Httpful/Handlers/XHtmlHandler.php',
        'Httpful\\Handlers\\XmlHandler' => __DIR__ . '/..' . '/nategood/httpful/src/Httpful/Handlers/XmlHandler.php',
        'Httpful\\Http' => __DIR__ . '/..' . '/nategood/httpful/src/Httpful/Http.php',
        'Httpful\\Httpful' => __DIR__ . '/..' . '/nategood/httpful/src/Httpful/Httpful.php',
        'Httpful\\Mime' => __DIR__ . '/..' . '/nategood/httpful/src/Httpful/Mime.php',
        'Httpful\\Proxy' => __DIR__ . '/..' . '/nategood/httpful/src/Httpful/Proxy.php',
        'Httpful\\Request' => __DIR__ . '/..' . '/nategood/httpful/src/Httpful/Request.php',
        'Httpful\\Response' => __DIR__ . '/..' . '/nategood/httpful/src/Httpful/Response.php',
        'Httpful\\Response\\Headers' => __DIR__ . '/..' . '/nategood/httpful/src/Httpful/Response/Headers.php',
        'Rox\\Foreup_api' => __DIR__ . '/../..' . '/src/Foreup_api.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit068c407a100451d5d5239a44ca88d87a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit068c407a100451d5d5239a44ca88d87a::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit068c407a100451d5d5239a44ca88d87a::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit068c407a100451d5d5239a44ca88d87a::$classMap;

        }, null, ClassLoader::class);
    }
}
