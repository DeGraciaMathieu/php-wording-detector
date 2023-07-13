<?php

namespace App\Nodes;

use PhpParser\Node;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Stmt\ClassMethod;

final class NodeValidator
{
    public static function isAVariable(Node $node): bool
    {
        return $node instanceof Variable;
    }

    public static function isAMethod(Node $node): bool
    {
        return $node instanceof ClassMethod;
    }
}
