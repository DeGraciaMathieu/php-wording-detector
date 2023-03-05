<?php

namespace App\Bags;

class WordsBag
{
    public function __construct(
        private $attributes = [],
    ) {}

    public function add(array $words): void
    {
        foreach ($words as $word) {

            $word = strtolower($word);

            if ($word === 'this') {
                continue;
            }

            if (isset($this->attributes[$word])) {
                $this->attributes[$word]++;
            } else {
                $this->attributes[$word] = 1;
            }
        }
    }

    public function sort(): void
    {
        uasort($this->attributes, function ($a, $b) {

            if ($a == $b) {
                return 0;
            }

            return ($a < $b) ? 1 : -1;
        });
    }

    public function get(): array
    {
        return $this->attributes;
    }
}
