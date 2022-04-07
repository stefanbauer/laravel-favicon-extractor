<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Favicon Provider
    |--------------------------------------------------------------------------
    |
    | This class is used for fetching favicons. You can swap it out easily if
    | you like as long as you implement the ProviderInterface.
    |
    | \StefanBauer\LaravelFaviconExtractor\Provider\ProviderInterface
    |
    */

    'provider_class' => \StefanBauer\LaravelFaviconExtractor\Provider\GoogleProvider::class,

    /*
    |--------------------------------------------------------------------------
    | Favicon Size
    |--------------------------------------------------------------------------
    |
    | This value is used for requesting a favicon of the given size (if supported by the given provider)
    |
    */

    'favicon_size' => 32,

    /*
    |--------------------------------------------------------------------------
    | Favicon Disk
    |--------------------------------------------------------------------------
    |
    | This value is used for providing a default disk for the favicon
    |
    */

    'disk' => 'public',
    
    /*
    |--------------------------------------------------------------------------
    | Filename Generator
    |--------------------------------------------------------------------------
    |
    | If you don't specify a custom filename on saving the downloaded favicon
    | to your storage, this package generates a random string for it. You
    | can override this behaviour at any time by using a custom
    | implementation which implements the following interface.
    |
    | \StefanBauer\LaravelFaviconExtractor\Generator\FilenameGeneratorInterface
    |
    */
   
    'filename_generator_class' => \StefanBauer\LaravelFaviconExtractor\Generator\FilenameGenerator::class,
];
