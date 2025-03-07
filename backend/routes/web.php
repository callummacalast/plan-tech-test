<?php

use App\Enums\ArrayFormatEnum;
use App\Factories\VideoDtoFactory;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/test', function () {
    $jsonData = json_decode(file_get_contents(base_path('db.json')), true);


    $data = [];
    foreach ($jsonData['videos'] as $video) {
        $t = app(VideoDtoFactory::class)->fromJsonImport($video);
        $data[] = $t->toArray(true);
    }
    return $data;
});
