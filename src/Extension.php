<?php

namespace EcomDev\PHPSpec\FileMatcher;

use EcomDev\PHPSpec\FileMatcher\Matcher\Directory;
use EcomDev\PHPSpec\FileMatcher\Matcher\File;
use EcomDev\PHPSpec\FileMatcher\Matcher\FileContent;
use PhpSpec\Extension as PhpSpecExtension;
use PhpSpec\ServiceContainer;

class Extension implements PhpSpecExtension
{
    public function load(ServiceContainer $container, array $params)
    {
        $container->define('matchers.file', function () {
            return new File();
        });

        $container->define('matchers.file_content', function () {
            return new FileContent();
        });

        $container->define('matchers.directory', function () {
            return new Directory();
        });
    }
}
