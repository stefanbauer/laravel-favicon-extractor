<?php

declare(strict_types=1);

namespace StefanBauer\LaravelFaviconExtractor\Favicon;

use Orchestra\Testbench\TestCase;

class FaviconFactoryTest extends TestCase
{
    public function test_it_creates_a_favicon()
    {
        $factory = new FaviconFactory();
        $favicon = $factory->create($expectedContent = 'content');

        $this->assertInstanceOf(Favicon::class, $favicon);
        $this->assertSame($expectedContent, $favicon->getContent());
    }
}
