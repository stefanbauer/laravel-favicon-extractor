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
        // accpts a domain, username or email,
        return 'https://unavatar.io/'.urlencode($url);
    }
}
