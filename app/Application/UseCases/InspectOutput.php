<?php

namespace App\Application\UseCases;

use Throwable;
use App\Domain\Aggregators\WordAggregator;

interface InspectOutput
{
    public function hello();
    public function present(WordAggregator $wordAggregator);
    public function error(Throwable $th);
}