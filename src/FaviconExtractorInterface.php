<?php

declare(strict_types=1);

namespace StefanBauer\LaravelFaviconExtractor;

use StefanBauer\LaravelFaviconExtractor\Favicon\FaviconInterface;

interface FaviconExtractorInterface
{
    public function fromUrl(string $url): self;
    public function getUrl(): string;
    public function fetchOnly(): FaviconInterface;
    public function fetchAndSaveTo(string $path, string $filename = null): string;
}
