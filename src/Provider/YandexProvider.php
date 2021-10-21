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
        // size options are limited to 16 & 32
        $faviconSize = config('favicon-extractor.favicon_size', 32) > 16 ? 32 : 16;
        $sizeQuery = '?size='.$faviconSize;
        return 'https://favicon.yandex.net/favicon/'.urlencode($url).$sizeQuery;
    }
}
