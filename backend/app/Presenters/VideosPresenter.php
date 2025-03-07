<?php

namespace App\Presenters;

use App\DataTransferObjects\VideoDto;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

class VideosPresenter
{
    public function present(?Collection $videoCollection): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $this->formatVideos($videoCollection)
        ], 200);
    }

    private function formatVideos(?Collection $videos): array
    {
        if (empty($videos)) {
            return [];
        }

        return $videos->map(function (VideoDto $dto) {
            return [
                'id' => $dto->getId(),
                'title' => $dto->getTitle(),
                'description' => $dto->getDescription(),
                'thumbnail_url' => $dto->getThumbnailUrl(),
                'duration' => $dto->getDuration(),
                'uploaded_at' => Carbon::parse($dto->getUploadedAt())->diffForHumans(),
                'views' => $this->formatViews($dto->getViews()) . ' views',
                'author' => $dto->getAuthor(),
                'video_url' => $dto->getVideoUrl(),
                'is_live' => $dto->getLive(),
                'subscriber_count' => $dto->getSubscriberCount(),
            ];
        })->values()->toArray();
    }

    private function formatViews($views)
    {
        if ($views >= 1000000) {
            return number_format($views / 1000000, 0) . 'M';
        } elseif ($views >= 1000) {
            return number_format($views / 1000, 0) . 'K';
        }

        return number_format($views);
    }
}
