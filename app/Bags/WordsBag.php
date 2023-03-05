<?php

namespace App\Bags;

class WordsBag
{
    public function __construct(
        private $attributes = [],
    ) {}

    public function add(array $values): void
    {
        foreach ($values as $value) {

            $value = strtolower($value);

            if (isset($this->attributes[$value])) {
                $this->attributes[$value]++;
            } else {
                $this->attributes[$value] = 1;
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
