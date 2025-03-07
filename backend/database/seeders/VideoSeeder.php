<?php

namespace Database\Seeders;

use App\Interfaces\Repositories\VideoRepositoryInterface;
use App\Factories\VideoDtoFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class VideoSeeder extends Seeder
{
    private VideoRepositoryInterface $videoRepositoryInterface;
    private VideoDtoFactory $videoDtoFactory;

    public function __construct()
    {
        $this->videoRepositoryInterface = app(VideoRepositoryInterface::class);
        $this->videoDtoFactory = app(VideoDtoFactory::class);
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filePath = base_path('db.json');

        if (!File::exists($filePath)) {
            $this->command->warn('db.json file not found. Please make sure the file exists.');
            return;
        }

        $jsonContent = File::get($filePath);

        if ($jsonContent === false) {
            $this->command->error("Failed to read 'db.json'.");
            return;
        }

        $jsonData = json_decode($jsonContent, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->command->error("Invalid JSON format in 'db.json': " . json_last_error_msg());
            return;
        }

        if (!isset($jsonData['videos']) || !is_array($jsonData['videos'])) {
            $this->command->error("Missing or invalid 'videos' key in 'db.json'.");
            return;
        }

        $data = [];
        foreach ($jsonData['videos'] as $video) {
            $data[] = $this->videoDtoFactory->fromJsonImport($video)->toCleanArray(true);
        }

        $this->videoRepositoryInterface->insert($data);
        $this->command->info(count($data) . ' Videos seeded successfully.');
    }
}
