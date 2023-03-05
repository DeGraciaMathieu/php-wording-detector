<?php

namespace App\Nodes;

use PhpParser\Node;

final class NodeValidator
{
    public static function isAVariable(Node $node): bool
    {
        return $node instanceof Node\Expr\Variable;
    }
}
