<?php

namespace App\Domain\Ports;

use App\Domain\Aggregators\FileAggregator;
use App\Domain\ValueObjects\Path;

interface FileService
{
     /**
      * Retrieves all files recursively in an absolute path.
      */
     public function all(Path $path): FileAggregator;
}
