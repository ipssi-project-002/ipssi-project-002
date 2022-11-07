<?php

namespace App\Entity;

class Picture extends Entity {
    protected ?string $id = null;
    protected int $width;
    protected int $height;
    protected string $url;
    protected string $filename;
    protected string $type;
    protected int $size;
    protected object $thumbnails;

    public static function default(): Picture {
        $data = [
            'width' => 0,
            'height' => 0,
            'url' => 'https://placeholder.pics/svg/512x512/dedede/555555/Image introuvable',
            'filename' => '',
            'type' => '',
            'size' => 0,
            'thumbnails' => (object) []
        ];
        return Picture::fromArray($data);
    }

    public function toRecord(): object {
        if (is_null($this->id)) {
            return (object) [
                'url' => $this->url
            ];
        } else {
            return (object) [
                'id' => $this->id
            ];
        }
    }

    public function getId(): ?string {
        return $this->id;
    }

    public function getWidth(): int {
        return $this->width;
    }

    public function getHeight(): int {
        return $this->height;
    }

    public function getUrl(): string {
        return $this->url;
    }

    public function getFilename(): string {
        return $this->filename;
    }

    public function getType(): string {
        return $this->type;
    }

    public function getSize(): int {
        return $this->size;
    }

    public function getThumbnails(): object {
        return $this->thumbnails;
    }

    public function getThumbnail(string $key): ?object {
        return isset($this->thumbnails->$key) ? $this->thumbnails->$key : null;
    }

    public function img(): string {
        return "<img src=\"{$this->getUrl()}\" />";
    }
}

?>
