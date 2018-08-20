<?php

declare(strict_types=1);

namespace StefanBauer\LaravelFaviconExtractor\Generator;

class FilenameGenerator implements FilenameGeneratorInterface
{
    public function generate(int $length): string
    {
        return str_random($length);
    }
}
