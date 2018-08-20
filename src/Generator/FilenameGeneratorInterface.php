<?php

declare(strict_types=1);

namespace StefanBauer\LaravelFaviconExtractor\Generator;

interface FilenameGeneratorInterface
{
    public function generate(int $length): string;
}
