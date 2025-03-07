<?php

namespace App\Repositories;

use App\DataTransferObjects\FilterDto;
use App\Models\Video;
use App\DataTransferObjects\VideoDto;
use App\Factories\VideoDtoFactory;
use App\Interfaces\Repositories\VideoRepositoryInterface;
use Illuminate\Support\Collection;

class VideoRepository implements VideoRepositoryInterface
{
    private Video $model;
    private VideoDtoFactory $videoDtoFactory;

    public function __construct()
    {
        $this->model = app(Video::class);
        $this->videoDtoFactory = app(VideoDtoFactory::class);
    }

    public function get(
        ?FilterDto $filterDto = null,
        ?array $relationships = []
    ): ?Collection {
        $search = $filterDto?->getSearch();

        $videos = $this->model
            ->with($relationships)
            ->when($search, fn($query) => $query
                ->where('title', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%"))
            ->where('live', true)
            ->get();

        // only get unique videos
        $uniqueVideos = $videos->unique(function ($video) {
            return $video->title . $video->author . $video->video_url;
        });

        return $this->videoDtoFactory->fromCollection($uniqueVideos);
    }

    public function insert(array $data): ?bool
    {
        return $this->model->insert($data);
    }
}
