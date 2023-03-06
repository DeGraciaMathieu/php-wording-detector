<?php

namespace Tests\Unit\Bags;

use PHPUnit\Framework\TestCase;
use App\Bags\WordsBag;

class WordsBagTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_aggregate_words(): void
    {
        $wordsBag = new WordsBag();

        $wordsBag->add(['a', 'b']);
        $wordsBag->add(['b']);

        $this->assertEquals([
            'a' => 1,
            'b' => 2,
        ], $wordsBag->get());
    }

    /**
     * @test
     */
    public function it_can_sort_words(): void
    {
        $wordsBag = new WordsBag();

        $wordsBag->add(['a', 'b', 'c']);
        $wordsBag->add(['b', 'c']);
        $wordsBag->add(['b']);

        $wordsBag->sort();

        $this->assertEquals([
            'b' => 3,
            'c' => 2,
            'a' => 1,
        ], $wordsBag->get());
    }
}
