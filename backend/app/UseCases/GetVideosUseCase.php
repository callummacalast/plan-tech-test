<?php

namespace App\UseCases;

use App\DataTransferObjects\FilterDto;
use App\Interfaces\Repositories\VideoRepositoryInterface;
use Illuminate\Support\Collection;

class GetVideosUseCase
{
    private VideoRepositoryInterface $videoRepositoryInterface;

    public function __construct()
    {
        $this->videoRepositoryInterface = app(VideoRepositoryInterface::class);
    }

    public function handle(?FilterDto $filterDto): ?Collection
    {
        return $this->videoRepositoryInterface->get($filterDto);
    }
}
