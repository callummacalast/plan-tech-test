<?php

namespace App\Factories;

use App\Models\Video;
use App\DataTransferObjects\VideoDto;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class VideoDtoFactory
{
    public function fromModel(?Video $video): ?VideoDto
    {
        if (empty($video)) {
            return null;
        }

        $dto = new VideoDto();

        $dto->setId($video->id);
        $dto->setTitle($video->title);
        $dto->setThumbnailUrl($video->thumbnail_url);
        $dto->setDuration($video->duration);
        $dto->setUploadedAt($video->uploaded_at);
        $dto->setViews($video->views);
        $dto->setAuthor($video->author);
        $dto->setVideoUrl($video->video_url);
        $dto->setDescription($video->description);
        $dto->setSubscriberCount($video->subscriber_count);
        $dto->setLive($video->live);
        $dto->setCreatedAt($video->created_at);
        $dto->setUpdatedAt($video->updated_at);

        return $dto;
    }

    public function fromRequest(FormRequest $request): ?VideoDto
    {
        $dto = new VideoDto();

        $dto->setSearch($request->get('search'));

        return $dto;
    }

    public function fromCollection(?Collection $collection): ?Collection
    {
        if (empty($collection)) {
            return null;
        }

        return $collection->map(function (Video $video) {
            return $this->fromModel($video);
        });
    }

    public function fromJsonImport(?array $jsonData): ?VideoDto
    {
        if (empty($jsonData)) {
            return null;
        }

        $dto = new VideoDto();

        $dto->setTitle($jsonData['title']);
        $dto->setThumbnailUrl($jsonData['thumbnailUrl']);
        $dto->setDuration(convertDurationToSeconds($jsonData['duration']) ?? $jsonData['duration']);
        $dto->setUploadedAt(Carbon::createFromDate($jsonData['uploadTime'])->format('Y-m-d'));
        $dto->setViews((int)str($jsonData['views'])->replace(',', '')->value());
        $dto->setAuthor($jsonData['author']);
        $dto->setVideoUrl($jsonData['videoUrl']);
        $dto->setDescription($jsonData['description']);
        $dto->setSubscriberCount((int)$jsonData['subscriber']);
        $dto->setLive($jsonData['isLive']);
        $dto->setUpdatedAt(now());
        $dto->setCreatedAt(now());

        return $dto;
    }
}
