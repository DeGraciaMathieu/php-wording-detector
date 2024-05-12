<?php

namespace App\Infrastructure\File\Mappers;

use App\Domain\Entities\FileEntity;
use DeGraciaMathieu\FileExplorer\File;
use App\Domain\Aggregators\FileAggregator;

class FileFinderMapper
{
    public function __construct(
        private FileAggregator $fileAggregator,
    ) {
    }

    public function map($files): FileAggregator
    {
        foreach ($files as $file) {

            $fileEntity = $this->makeEntity($file);

            $this->fileAggregator->add($fileEntity);
        }

        return $this->fileAggregator;
    }

    private function makeEntity(File $file): FileEntity
    {
        return FileEntity::from([
            'fullPath' => $file->fullPath,
            'displayPath' => $file->displayPath,
            'contents' => $file->contents(),
        ]);
    }
}
