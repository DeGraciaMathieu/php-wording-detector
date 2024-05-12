<?php

namespace App\Domain\Ports;

use App\Domain\Aggregators\FileAggregator;
use App\Domain\Aggregators\WordAggregator;

interface AnalyzeService
{
     /**
      * Retrieve all words from a set of files.
      *
      * withMethod argument allows including the words present in the function signatures.
      */
     public function getWords(FileAggregator $fileAggregator, bool $withMethod): WordAggregator;
}
