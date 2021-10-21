<?php

declare(strict_types=1);

namespace StefanBauer\LaravelFaviconExtractor\Provider;

use GrahamCampbell\GuzzleFactory\GuzzleFactory;

class DuckDuckGoProvider implements ProviderInterface
{
    public function fetchFromUrl(string $url): string
    {
        $client = GuzzleFactory::make();
      
        $response = $client->get($this->getUrl($url));

        return $response->getBody()->getContents();
    }

    private function getUrl(string $url): string
    {
        $domain = preg_replace('/https?:\/\/([\w\-\.]+)\/?.*/i', '$1', $url);
      
        return 'https://icons.duckduckgo.com/ip3/'.$domain;
    }
}
