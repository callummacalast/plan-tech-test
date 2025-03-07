<?php

namespace App\Interfaces\Repositories;

use App\DataTransferObjects\FilterDto;
use App\DataTransferObjects\VideoDto;
use Illuminate\Support\Collection;

interface VideoRepositoryInterface
{
    public function get(
        ?FilterDto $filterDto = null,
        ?array $relationships = []
    ): ?Collection;

    public function insert(array $data): ?bool;
}
