<?php

declare(strict_types=1);

namespace StefanBauer\LaravelFaviconExtractor\Favicon;

use Orchestra\Testbench\TestCase;

class FaviconTest extends TestCase
{
    public function test_it_has_content()
    {
        $favicon = new Favicon($expectedContent = 'content');

        $this->assertSame($expectedContent, $favicon->getContent());
    }
}
