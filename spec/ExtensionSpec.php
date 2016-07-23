<?php

namespace spec\EcomDev\PHPSpec\FileMatcher;

use EcomDev\PHPSpec\FileMatcher\Matcher\Directory;
use EcomDev\PHPSpec\FileMatcher\Matcher\File;
use EcomDev\PHPSpec\FileMatcher\Matcher\FileContent;
use PhpSpec\ObjectBehavior;
use PhpSpec\ServiceContainer;
use Prophecy\Argument;

class ExtensionSpec extends ObjectBehavior
{
    function it_implements_extension_interface()
    {
        $this->shouldImplement('PhpSpec\Extension');
    }

    function it_adds_existing_matchers(ServiceContainer $container)
    {
        $container->define('matchers.file', Argument::that(function ($value) {
            return ($value()) instanceof File;
        }))->shouldBeCalled();

        $container->define('matchers.file_content', Argument::that(function ($value) {
            return ($value()) instanceof FileContent;
        }))->shouldBeCalled();

        $container->define('matchers.directory', Argument::that(function ($value) {
            return ($value()) instanceof Directory;
        }))->shouldBeCalled();

        $this->load($container, []);
    }
}
