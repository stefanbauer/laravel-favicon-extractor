<?php

declare(strict_types=1);

namespace StefanBauer\LaravelFaviconExtractor;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use StefanBauer\LaravelFaviconExtractor\Exception\FaviconCouldNotBeSavedException;
use StefanBauer\LaravelFaviconExtractor\Exception\InvalidUrlException;
use StefanBauer\LaravelFaviconExtractor\Favicon\FaviconFactoryInterface;
use StefanBauer\LaravelFaviconExtractor\Favicon\FaviconInterface;
use StefanBauer\LaravelFaviconExtractor\Generator\FilenameGeneratorInterface;
use StefanBauer\LaravelFaviconExtractor\Provider\ProviderInterface;

class FaviconExtractor implements FaviconExtractorInterface
{
    private $faviconFactory;
    private $provider;
    private $filenameGenerator;
    private $url;
    private $favicon;

    public function __construct(FaviconFactoryInterface $faviconFactory, ProviderInterface $provider, FilenameGeneratorInterface $filenameGenerator)
    {
        $this->provider = $provider;
        $this->faviconFactory = $faviconFactory;
        $this->filenameGenerator = $filenameGenerator;
    }

    public function fromUrl(string $url): FaviconExtractorInterface
    {
        $this->url = $url;

        return $this;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function fetchOnly(): FaviconInterface
    {
        $this->favicon = $this->faviconFactory->create(
            $this->provider->fetchFromUrl($this->getUrl())
        );

        return $this->favicon;
    }

    public function fetchAndSaveTo(string $path, string $filename = null): string
    {
        if (null === $filename) {
            $filename = $this->filenameGenerator->generate(16);
        }

        $favicon = $this->fetchOnly();
        $targetPath = $this->getTargetPath($path, $filename);
        $targetDisk = config('favicon-exractor.disk', 'public');

        if (!Storage::disk($targetDisk)->put($targetPath, $favicon->getContent())) {
            throw new FaviconCouldNotBeSavedException(sprintf(
                'The favicon of %s could not be saved at path "%s" ',
                $this->getUrl(),
                $targetPath
            ));
        }

        return Str::replaceFirst('public/', '', $targetPath);
    }

    private function getTargetPath(string $path, string $filename): string
    {
        return $path.DIRECTORY_SEPARATOR.$filename.'.png';
    }
}
