<?php

namespace Tests\Unit\Nodes;

use PHPUnit\Framework\TestCase;
use App\Nodes\NodeExtractor;
use PhpParser\Node\Expr\Variable;

class NodeExtractorTest extends TestCase
{
    /**
     * @test
     * @dataProvider nameProvider
     */
    public function it_can_cut_name_into_words(string $name, array $expectedWords): void
    {
        $variable = new Variable(
            name: $name,
            attributes: [],
        );

        $words = NodeExtractor::cutNameIntoWords($variable);

        $this->assertEquals($expectedWords, $words);
    }

    public static function nameProvider(): array
    {
        return [
            ['getAllFoo', ['get', 'All', 'Foo']],
            ['getallfoo', ['getallfoo']],
            ['get', ['get']],
        ];
    }
}
