<?php

namespace App\DataTransferObjects;

use App\Traits\DtoToArrayTrait;
use Carbon\Carbon;

class VideoDto
{
    use DtoToArrayTrait;
    private ?int $id = null;
    private ?string $title = null;
    private ?string $thumbnailUrl = null;
    private ?int $duration = null;
    private Carbon|string|null $uploadedAt = null;
    private ?int $views = null;
    private ?string $author = null;
    private ?string $videoUrl = null;
    private ?string $description = null;
    private ?int $subscriberCount = null;
    private ?bool $live = null;
    private Carbon|string|null $createdAt = null;
    private Carbon|string|null $updatedAt = null;

    // Filters
    private ?string $search = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): ?VideoDto
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): ?VideoDto
    {
        $this->title = $title;
        return $this;
    }

    public function getThumbnailUrl(): ?string
    {
        return $this->thumbnailUrl;
    }

    public function setThumbnailUrl(?string $thumbnailUrl): ?VideoDto
    {
        $this->thumbnailUrl = $thumbnailUrl;
        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(?int $duration): ?VideoDto
    {
        $this->duration = $duration;
        return $this;
    }

    public function getUploadedAt(): Carbon|string|null
    {
        return $this->uploadedAt;
    }

    public function setUploadedAt(Carbon|string|null $uploadedAt): ?VideoDto
    {
        $this->uploadedAt = $uploadedAt;
        return $this;
    }

    public function getViews(): ?int
    {
        return $this->views;
    }

    public function setViews(?int $views): ?VideoDto
    {
        $this->views = $views;
        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(?string $author): ?VideoDto
    {
        $this->author = $author;
        return $this;
    }

    public function getVideoUrl(): ?string
    {
        return $this->videoUrl;
    }

    public function setVideoUrl(?string $videoUrl): ?VideoDto
    {
        $this->videoUrl = $videoUrl;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): ?VideoDto
    {
        $this->description = $description;
        return $this;
    }

    public function getSubscriberCount(): ?int
    {
        return $this->subscriberCount;
    }

    public function setSubscriberCount(?int $subscriberCount): ?VideoDto
    {
        $this->subscriberCount = $subscriberCount;
        return $this;
    }

    public function getLive(): ?bool
    {
        return $this->live;
    }

    public function setLive(?bool $live): ?VideoDto
    {
        $this->live = $live;
        return $this;
    }

    public function getCreatedAt(): ?Carbon
    {
        return $this->createdAt;
    }

    public function setCreatedAt(Carbon|string|null $createdAt): ?VideoDto
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getUpdatedAt(): ?Carbon
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(Carbon|string|null $updatedAt): ?VideoDto
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    public function getSearch(): ?string
    {
        return $this->search;
    }

    public function setSearch(?string $search): ?VideoDto
    {
        $this->search = $search;
        return $this;
    }
}
