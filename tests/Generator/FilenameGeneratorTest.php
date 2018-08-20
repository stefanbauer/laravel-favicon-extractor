<?php

declare(strict_types=1);

namespace StefanBauer\LaravelFaviconExtractor\Generator;

use Orchestra\Testbench\TestCase;

class FilenameGeneratorTest extends TestCase
{
    public function test_it_generates_a_random_string_by_given_length()
    {
        $generator = new FilenameGenerator();
        $generated = $generator->generate($expectedLength = 10);

        $this->assertSame($expectedLength, strlen($generated));
    }
}
