<?php

namespace App\Infrastructure\Analyze\Mappers;

use App\Domain\Entities\WordEntity;
use App\Domain\Aggregators\WordAggregator;

class PhpParserWordMapper
{
    public function __construct(
        private WordAggregator $wordAggregator,
    ) {
    }

    public function map(array $words): void
    {
        foreach ($words as $word) {
            $this->wordAggregator->add(
                WordEntity::from($word),
            );
        }
    }

    public function aggregate(): WordAggregator
    {
        return $this->wordAggregator;
    }
}
