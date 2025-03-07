<?php

namespace App\DataTransferObjects;

class FilterDto
{
    public ?string $search = null;

    public function setSearch(?string $search): ?FilterDto
    {
        $this->search = $search;

        return $this;
    }

    public function getSearch(): ?string
    {
        return $this->search;
    }
}
