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
        $container->set('matchers.file', function () {
            return new File();
        });

        $container->set('matchers.file_content', function () {
            return new FileContent();
        });

        $container->set('matchers.directory', function () {
            return new Directory();
        });
    }
}
