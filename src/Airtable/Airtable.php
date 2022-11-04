<?php

namespace App\Airtable;

use GuzzleHttp\Client;
use GuzzleHttp\Exception;

class Airtable {
    private const BASE_URL = 'https://api.airtable.com/v0';
    
    private string $apiKey;
    private string $baseId;

    private Client $client;

    public static function formula(array $filters) {
        $conditions = array();
        foreach ($filters as $key => $value) {
            $conditions[] = "$key='${value}'";
        }
        $conditions = implode(',', $conditions);
        return "AND(${conditions})";
    }

    public function __construct(string $apiKey, string $baseId) {
        $this->apiKey = $apiKey;
        $this->baseId = $baseId;
        $this->client = new Client([
            'headers' => [
                'Authorization' => "Bearer ${apiKey}",
                'Accept' => 'application/json; charset=utf-8',
            ]
        ]);
    }

    public function request(
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

        try {
            $response = $this->client->request($method, $url, $req_options);
        } catch (
            Exception\TooManyRedirectsException|
            Exception\ClientException|
            Exception\ServerException
            $e) {
            if ($e->hasResponse()) {
                $response = $e->getResponse();
            }
        } catch (\Exception $e) {
            throw $e;
        }
        return new Response($response);
    }

    public function get(string $table, array $query = []): Response {
        return $this->request("/$table", 'GET', null, [], null, $query);
    }

    public function create(string $table, array $records, array $query = []): Response {
        return $this->request(
            "/$table",
            'POST',
            [ 'records' => $records ],
            [ 'Content-Type' => 'application/json; charset=utf-8' ],
            null,
            $query
        );
    }

    public function update(string $table, array $records, array $query = []): Response {
        return $this->request(
            "/$table",
            'PATCH',
            [ 'records' => $records ],
            [ 'Content-Type' => 'application/json; charset=utf-8' ],
            null,
            $query
        );
    }

    public function delete(string $table, array $record_ids, array $query = []): Response {
        return $this->request(
            "/$table",
            'DELETE',
            null,
            [],
            null,
            [ ...$query, 'records' => $record_ids ]
        );
    }
}

?>
