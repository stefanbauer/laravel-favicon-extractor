<?php

declare(strict_types=1);

namespace StefanBauer\LaravelFaviconExtractor\Favicon;

interface FaviconInterface
{
    public function getContent(): string;
}
