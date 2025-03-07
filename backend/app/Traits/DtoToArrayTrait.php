<?php

namespace App\Traits;

use Illuminate\Support\Str;

/**
 * A trait class that can be added to DTOs to easily take all properties of the class and output to an array
 * Class DtoToArrayTrait
 */
trait DtoToArrayTrait
{
    /**
     * Gets all properties that are not null or empty strings and returns as an array
     */
    public function toCleanArray(bool $format = false, int $formatType = 1): array
    {
        $arr = $this->toArray($format, $formatType);

        return array_filter($arr, function ($value) {
            return ! is_null($value) && $value !== '';
        });
    }

    /**
     * Gets the properties of the given object and turns it into an array
     */
    public function toArray(bool $format = false, int $formatType = 1): array
    {
        $arr = get_object_vars($this);

        if ($format) {
            $arr = $this->formatArray($arr, $formatType);
        }

        return $arr;
    }

    /**
     * Format a given array to change the key to either camelCase or snake_case
     * Default is snake_case as this will be used more when sending information through the API
     */
    private function formatArray(array $arr, int $type = 1): array
    {
        $formattedArr = [];


        foreach ($arr as $key => $value) {
            $formattedKey = $type === 1 ? Str::snake($key) : Str::camel($key);
            $formattedArr[$formattedKey] = $value;
        }

        return $formattedArr;
    }
}
