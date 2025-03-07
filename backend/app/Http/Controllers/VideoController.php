<?php

namespace App\Http\Controllers;

use App\Factories\FilterDtoFactory;
use App\Http\Requests\GetVideosRequest;
use App\Presenters\VideosPresenter;
use App\UseCases\GetVideosUseCase;
use Illuminate\Http\JsonResponse;

class VideoController extends Controller
{
    private FilterDtoFactory $filterDtoFactory;

    public function __construct()
    {
        $this->filterDtoFactory = app(FilterDtoFactory::class);
    }

    public function index(GetVideosRequest $request): ?JsonResponse
    {
        $filterDto = $this->filterDtoFactory->fromRequest($request);

        return app(VideosPresenter::class)->present(
            app(GetVideosUseCase::class)->handle($filterDto)
        );
    }
}
