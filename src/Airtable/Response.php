<?php

namespace App\Airtable;

class Response {
    private int $statusCode;
    private string $reasonPhrase;
    private bool $is_ok;
    private array $headers;
    private ?string $body;
    private ?Object $json;
    private ?array $records;

    public function __construct(Object $response) {
        $this->statusCode = $response->getStatusCode();
        $this->reasonPhrase = $response->getReasonPhrase();
        $this->is_ok = $response->getStatusCode() >= 200 && $response->getStatusCode() < 300;
        $this->headers = $response->getHeaders();
        $this->body = (string) $response->getBody();
        $this->json = json_decode($this->body, false);
        if ($this->is_ok && $this->json) {
            $this->records = $this->json->records;
        } else {
            $this->records = null;
        }
    }

    public function getStatusCode(): int {
        return $this->statusCode;
    }

    public function getReasonPhrase(): string {
        return $this->reasonPhrase;
    }

    public function isOk(): bool {
        return $this->is_ok;
    }

    public function getHeaders(): array {
        return $this->headers;
    }

    public function getBody(): ?string {
        return $this->body;
    }

    public function getJson(): ?array {
        return $this->json;
    }

    public function getRecords(): ?array {
        return $this->records;
    }
}

?>
