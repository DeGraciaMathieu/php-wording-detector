<?php

namespace Tests\Unit\Nodes;

use PHPUnit\Framework\TestCase;
use App\Nodes\NodeValidator;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Stmt\ClassMethod;

class NodeValidatorTest extends TestCase
{
    /**
     * @test
     */
    public function it_able_to_check_node_is_a_variable(): void
    {
        $variable = new Variable(
            name: 'getAllFoo',
            attributes: [],
        );

        $isAVariable = NodeValidator::isAVariable($variable);

        $this->assertTrue($isAVariable);
    }

    /**
     * @test
     */
    public function it_able_to_check_node_is_a_method(): void
    {
        $method = new ClassMethod(
            name: 'getAllFoo',
        );

        $isAVariable = NodeValidator::isAMethod($method);

        $this->assertTrue($isAVariable);
    }

    /**
     * @test
     */
    public function it_able_to_handle_an_unexpected_node(): void
    {
        $variable = new Array_(
            items: [],
            attributes: [],
        );

        $isAVariable = NodeValidator::isAVariable($variable);

        $this->assertFalse($isAVariable);
    }
}
