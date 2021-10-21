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
        $faviconSize = config('favicon-extractor.favicon_size', 32);
        $sizeQuery = '&sz='.$faviconSize;
        return 'https://www.google.com/s2/favicons?domain='.urlencode($url).$sizeQuery;
    }
}
