<?php

namespace Tests\Unit\Domain\Aggregators;

use PHPUnit\Framework\TestCase;
use App\Domain\Entities\WordEntity;
use PHPUnit\Framework\Attributes\Test;
use App\Domain\Aggregators\WordAggregator;

class WordAggregatorTest extends TestCase
{
    #[Test]
    public function it_can_aggregate_words(): void
    {
        $aggregator = new WordAggregator();

        $aggregator->add(WordEntity::from('a'));
        $aggregator->add(WordEntity::from('b'));
        $aggregator->add(WordEntity::from('b'));

        $this->assertEquals([
            'a' => 1,
            'b' => 2,
        ], $aggregator->words());
    }

    #[Test]
    public function it_can_sort_words(): void
    {
        $aggregator = new WordAggregator();

        $aggregator->add(WordEntity::from('a'));
        $aggregator->add(WordEntity::from('b'));
        $aggregator->add(WordEntity::from('b'));

        $aggregator->sort();

        $this->assertEquals([
            'b' => 2,
            'a' => 1,
        ], $aggregator->words());
    }
}
