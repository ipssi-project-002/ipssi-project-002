<?php

namespace App\Airtable;

use GuzzleHttp\Client;

class Airtable {
    private const BASE_URL = 'https://api.airtable.com/v0';
    
    private string $apiKey;
    private string $baseId;

    private Client $client;

    public function __construct(string $apiKey, string $baseId) {
        $this->apiKey = $apiKey;
        $this->baseId = $baseId;
        $this->client = new Client([
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
            'query' => $query,
            'verify' => false
        ];
        if ($json_data) {
            $req_options['json'] = $json_data;
        }
        if ($raw_data) {
            $req_options['body'] = $raw_data;
        }

        $url = self::BASE_URL . "/{$this->baseId}$url";

        $response = $this->client->request($method, $url, $req_options);
        $code = $response->getStatusCode();
        var_dump($response);
        return 0;
    }
}

?>
