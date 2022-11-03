<?php

namespace App\Airtable;

use GuzzleHttp\Client;

class Airtable {
    const BASE_URL = 'https://api.airtable.com/v0';
    
    private string $apiKey;
    private string $baseId;

    private Client $client;

    public function __construct(string $apiKey, string $baseId) {
        $this->apiKey = $apiKey;
        $this->baseId = $baseId;
        $this->client = new Client([
            'base_uri' => self::BASE_URL,
            'headers' => [
                'Authorization' => "Bearer ${apiKey}"
            ]
        ]);
    }

    public function makeRequest(
        string $url,
        string $method = 'GET',
        ?array $json_data = null,
        array $headers = [],
        mixed $raw_data = null,
        array $query = []
    ) {
        $req_options = [
            'headers' => $headers,
            'query' => $query
        ];
        if ($json_data) {
            $req_options['json'] = $json_data;
        }
        if ($raw_data) {
            $req_options['body'] = $raw_data;
        }

        $response = $this->client->request($method, $url, $req_options);
        $code = $response->getStatusCode();
        var_dump($response);
        return 0;
    }
}

?>
