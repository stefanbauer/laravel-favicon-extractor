<?php

declare(strict_types=1);

namespace StefanBauer\LaravelFaviconExtractor\Provider;

use GrahamCampbell\GuzzleFactory\GuzzleFactory;

class GoogleProvider implements ProviderInterface
{
    public function fetchFromUrl(string $url): string
    {
        $client = GuzzleFactory::make();
        $response = $client->get($this->getUrl($url));

        return $response->getBody()->getContents();
    }

    private function getUrl(string $url): string
    {
        $favicon_size = config('favicon-extractor.favicon_size', 32);
        $size_query = '&sz='.$favicon_size;
        return 'https://www.google.com/s2/favicons?domain='.urlencode($url).$size_query;
    }
}
