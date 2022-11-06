<?php

namespace App\Airtable;

use GuzzleHttp\Client;
use GuzzleHttp\Exception;

class Airtable {
    private const BASE_URL = 'https://api.airtable.com/v0';
    
    private string $api_key;
    private string $base_id;

    private array $tables;

    private Client $client;

    public static function formula(array $filters) {
        $conditions = array();
        foreach ($filters as $key => $value) {
            $conditions[] = "$key='${value}'";
        }
        $conditions = implode(',', $conditions);
        return "AND(${conditions})";
    }

    public function __construct() {
        $this->getConfig();
        $this->client = new Client([
            'headers' => [
                'Authorization' => "Bearer {$this->api_key}",
                'Accept' => 'application/json; charset=utf-8',
            ]
        ]);
    }

    public function getConfig(): void {
        $this->api_key = $_ENV['AIRTABLE_API_KEY'];
        $this->base_id = $_ENV['AIRTABLE_BASE_ID'];

        foreach ($_ENV as $key => $value) {
            if (preg_match('/^TABLE_(?<tableName>.*)$/i', $key, $matches)) {
                $table_name = $matches['tableName'];
                $this->tables[$table_name] = $value;
            }
        }
    }

    public function getTable(string $table_name): string {
        if (array_key_exists($table_name, $this->tables)) {
            return $this->tables[$table_name];
        } else {
            throw new \Exception("Airtable: Table '${table_name}' not found");
        }
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

        $url = self::BASE_URL . "/{$this->base_id}$url";

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
        return $this->request(
            url: "/{$table}",
            method: 'GET',
            query: $query
        );
    }

    public function create(string $table, array $records, array $query = []): Response {
        return $this->request(
            url: "/{$table}",
            method: 'POST',
            json_data: [ 'records' => $records ],
            headers: [ 'Content-Type' => 'application/json; charset=utf-8' ],
            query: $query
        );
    }

    public function update(string $table, array $records, array $query = []): Response {
        $json_data = [
            'performUpsert' => [
                'fieldsToMergeOn' => [ 'reference' ]
            ],
            'records' => $records
        ];
        return $this->request(
            url: "/{$table}",
            method: 'PATCH',
            json_data: $json_data,
            headers: [ 'Content-Type' => 'application/json; charset=utf-8' ],
            query: $query
        );
    }

    public function delete(string $table, array $record_ids, array $query = []): Response {
        return $this->request(
            url: "/{$table}",
            method: 'DELETE',
            query: [ ...$query, 'records' => $record_ids ]
        );
    }
}

?>
