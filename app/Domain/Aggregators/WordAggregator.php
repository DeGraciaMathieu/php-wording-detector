<?php

namespace App\Domain\Aggregators;

use App\Domain\Entities\WordEntity;
use App\Domain\Services\WordSorter;

class WordAggregator
{
    private array $words = [];

    public function add(WordEntity $wordEntity): void
    {
        if ($wordEntity->canBeIgnored()) {
            return;
        }

        $this->increment($wordEntity);
    }

    public function sort(): void
    {
        uasort($this->words, function ($a, $b) {
            return $this->sortWordsByDesc($a, $b);
        });
    }

    public function words(): array
    {
        return $this->words;
    }

    private function increment(WordEntity $wordEntity): void
    {
        $word = $wordEntity->value();

        /**
         * Wow, it works well, don't judge me
         */
        @$this->words[$word]++;
    }

    private function sortWordsByDesc($a, $b): int
    {
        if ($a == $b) {
            return 0;
        }

        return ($a < $b) ? 1 : -1;
    }
}
