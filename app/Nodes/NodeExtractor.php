<?php

namespace App\Nodes;

use PhpParser\Node;
use PhpParser\Node\Expr\Variable;

final class NodeExtractor
{
    public static function cutNameIntoWords(Node $node): array
    {
        $name = self::getNodeName($node);

        preg_match_all("/([a-z]+)|([A-Z][a-z]+)|([^_\W]+)/", $name, $matches);

        return $matches[0];
    }

    public static function getNodeName(Node $node): string
    {
        $name = $node->name;

        if ($name instanceof Variable) {
            return $name->name;
        }

        return $name;
    }
}
