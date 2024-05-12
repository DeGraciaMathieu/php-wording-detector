<?php

namespace App\Domain\Aggregators;

use App\Domain\Entities\FileEntity;

class FileAggregator
{
    private array $files = [];

    public function add(FileEntity $fileEntity): void
    {
        $this->files[] = $fileEntity;
    }

    public function files(): array
    {
        return $this->files;
    }
}
