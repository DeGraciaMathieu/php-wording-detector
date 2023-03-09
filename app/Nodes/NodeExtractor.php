<?php

namespace App\Nodes;

use PhpParser\Node;

final class NodeExtractor
{
    public static function cutNameIntoWords(Node $node): array
    {
        preg_match_all("/([a-z]+)|([A-Z][a-z]+)|([^_\W]+)/", $node->name, $matches);

        return $matches[0];
    }
}
