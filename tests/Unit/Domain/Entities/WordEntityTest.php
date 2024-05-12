<?php

namespace Tests\Unit\Domain\Aggregators;

use PHPUnit\Framework\TestCase;
use App\Domain\Entities\WordEntity;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\DataProvider;

class WordEntityTest extends TestCase
{
    #[Test]
    public function it_lowercases_the_word_value(): void
    {
        $word = WordEntity::from('Foo');

        $this->assertSame($word->value(), 'foo');
    }

    #[Test]
    public function it_accepts_common_words(): void
    {
        $word = WordEntity::from('Foo');

        $this->assertFalse($word->canBeIgnored());
    }


    #[Test]
    #[DataProvider('words')]
    public function it_can_ignore_some_words(string $word): void
    {
        $word = WordEntity::from($word);

        $this->assertTrue($word->canBeIgnored());
    }

    public static function words(): array
    {
        return [
            ['this'],
        ];
    }
}
