<?php

namespace App\Factories;

use App\DataTransferObjects\FilterDto;
use Illuminate\Foundation\Http\FormRequest;

class FilterDtoFactory
{
    public function fromRequest(FormRequest $request): ?FilterDto
    {
        $dto = new FilterDto();

        $dto->setSearch($request->get('search'));

        return $dto;
    }
}
