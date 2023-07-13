<?php

namespace Tests\Unit\Nodes;

use PHPUnit\Framework\TestCase;
use App\Nodes\NodeExtractor;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Stmt\ClassMethod;

class NodeExtractorTest extends TestCase
{
    /**
     * @test
     * @dataProvider nameProvider
     */
    public function it_can_cut_variable_into_words(string $name, array $expectedWords): void
    {
        $variable = new Variable(
            name: $name,
            attributes: [],
        );

        $words = NodeExtractor::cutNameIntoWords($variable);

        $this->assertEquals($expectedWords, $words);
    }

    /**
     * @test
     * @dataProvider nameProvider
     */
    public function it_can_cut_method_into_words(string $name, array $expectedWords): void
    {
        $method = new ClassMethod(
            name: $name,
        );

        $words = NodeExtractor::cutNameIntoWords($method);

        $this->assertEquals($expectedWords, $words);
    }

    public static function nameProvider(): array
    {
        return [
            ['getAllFoo', ['get', 'All', 'Foo']],
            ['get_all_foo', ['get', 'all', 'foo']],
            ['Get_All_Foo', ['Get', 'All', 'Foo']],
            ['get_All_Foo', ['get', 'All', 'Foo']],
            ['getallfoo', ['getallfoo']],
            ['get', ['get']],
        ];
    }

    /**
     * @test
     */
    public function it_can_get_the_name_even_if_its_a_variable(): void
    {
        $variable = new Variable(
            name: new Variable(
                name: 'getAllFoo',
            ),
        );

        $words = NodeExtractor::cutNameIntoWords($variable);

        $this->assertEquals(['get', 'All', 'Foo'], $words);
    }
}
