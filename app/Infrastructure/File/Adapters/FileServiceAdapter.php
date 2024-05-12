<?php

namespace App\Infrastructure\File\Adapters;

use App\Domain\ValueObjects\Path;
use App\Domain\Ports\FileService;
use App\Domain\Aggregators\FileAggregator;
use DeGraciaMathieu\FileExplorer\FileFinder;
use App\Infrastructure\File\Mappers\FileFinderMapper;

class FileServiceAdapter implements FileService
{
    public function __construct(
        private FileFinderMapper $mapper,
    ) {}

    public function all(Path $path): FileAggregator
    {
        $finder = new FileFinder(
            basePath: getcwd(),
        );

        $files = $finder->getFiles(
            $path->value(),
        );

        return $this->mapper->map($files);
    }
}
