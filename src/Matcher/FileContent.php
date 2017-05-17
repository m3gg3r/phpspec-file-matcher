<?php

namespace EcomDev\PHPSpec\FileMatcher\Matcher;

use PhpSpec\Exception\Example\FailureException;

/**
 * File content matcher
 */
class FileContent extends AbstractMatcher
{
    /**
     * Creates a new file content matcher
     */
    public function __construct()
    {
        parent::__construct(['have', 'create'], ['fileContent' => 2]);
    }

    /**
     * Checks consistence of passed file and content arguments
     *
     * @param string $name
     * @param mixed $subject
     * @param array $arguments
     *
     * @throws FailureException
     */
    public function positiveMatch($name, $subject, array $arguments)
    {
        list($file, $content) = $arguments;
        $fileContent = @file_get_contents($file);
        if ($content !== $fileContent) {
            throw new FailureException(sprintf(
                'File "%s" content'.PHP_EOL.'"%s"'.PHP_EOL.'does not match expected content'.PHP_EOL.'"%s"',
                $file,
                $fileContent,
                $content
            ));
        }
    }

    /**
     * Checks that content does not match file and content arguments
     *
     * @param string $name
     * @param mixed $subject
     * @param array $arguments
     *
     * @throws FailureException
     */
    public function negativeMatch($name, $subject, array $arguments)
    {
        list($file, $content) = $arguments;
        $fileContent = @file_get_contents($file);
        if ($content === $fileContent) {
            throw new FailureException(sprintf(
                'File "%s" content'.PHP_EOL.'"%s"'.PHP_EOL.'matches unexpected content'.PHP_EOL.'"%s"',
                $file,
                $fileContent,
                $content
            ));
        }
    }
}
