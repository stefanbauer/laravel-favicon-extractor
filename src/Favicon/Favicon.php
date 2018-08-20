<?php

declare(strict_types=1);

namespace StefanBauer\LaravelFaviconExtractor\Favicon;

class Favicon implements FaviconInterface
{
    private $content;

    public function __construct($content)
    {
        $this->content = $content;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
