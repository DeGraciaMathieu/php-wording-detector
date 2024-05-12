<?php

namespace App\Infrastructure\Analyze\Mappers;

use App\Domain\Entities\WordEntity;
use App\Domain\Aggregators\WordAggregator;

class AnalyzeServiceMapper
{
    public function __construct(
        private WordAggregator $wordAggregator,
    ) {
    }

    public function map(array $words): void
    {
        foreach ($words as $word) {
            $this->add($word);
        }
    }

    public function aggregate(): WordAggregator
    {
        return $this->wordAggregator;
    }

    private function add(string $word): void
    {
        $this->wordAggregator->add(
            WordEntity::from($word),
        );
    }
}
