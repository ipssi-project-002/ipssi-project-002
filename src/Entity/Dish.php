<?php

namespace App\Entity;

class Dish extends Entity {
    protected ?string $id = null;
    protected ?string $slug = null;
    protected string $name;
    protected string $category;
    protected float $price;
    protected string $description;
    protected array $tags = [];
    protected array $pictures = [];
    protected array $changes = [];

    public function toRecord(): object {
        $record = (array) parent::toRecord();
        $record['fields'] = [
            ...$record['fields'],
            'slug' => $this->slug,
            'name' => $this->name,
            'category' => $this->category,
            'price' => $this->price,
            'description' => $this->description,
            'tags' => $this->tags,
            'pictures' => []
        ];
        $pictures = $this->getPictures();
        foreach ($pictures as $picture) {
            $record['fields']['pictures'][] = $picture->toRecord();
        }
        return (object) $record;
    }

    public function getId(): ?string {
        return $this->id;
    }

    public function getSlug(): string {
        return $this->slug;
    }

    public function setSlug(string $slug): void {
        $this->slug = $slug;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function getCategory(): string {
        return $this->category;
    }

    public function setCategory(string $category): void {
        $this->category = $category;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function setPrice(float $price): void {
        $this->price = $price;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }

    public function getTags(): array {
        return $this->tags;
    }

    public function setTags(array $tags): void {
        $this->tags = $tags;
    }

    public function addTag(string $tag): void {
        $this->tags[] = $tag;
    }

    public function removeTag(string $tag): void {
        $this->tags = array_filter($this->tags, function ($t) use ($tag) {
            return $t !== $tag;
        });
    }

    public function getPictures(): array {
        $pictures = [];
        foreach ($this->pictures as $picture) {
            $pictures[] = Picture::fromArray((array) $picture);
        }
        return $pictures;
    }

    public function setPictures(array $pictures): void {
        $this->pictures = $pictures;
    }

    public function addPicture(Picture $picture): void {
        $this->pictures[] = $picture;
    }

    public function getChanges(): array {
        return $this->changes;
    }

    public function getLatestChange(): ?DishChange {
        $changes = $this->getChanges();
        usort($changes, function ($a, $b) {
            return $a->getChangeDate() < $b->getChangeDate();
        });
        if (count($changes) > 0) {
            return $changes[0];
        } else {
            return null;
        }
    }

    public function addChange(DishChange $change): void {
        $this->changes[] = $change;
    }
}

?>
