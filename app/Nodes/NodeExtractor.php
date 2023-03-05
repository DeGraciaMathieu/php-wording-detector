<?php

namespace App\Nodes;

use PhpParser\Node;

final class NodeExtractor
{
    public static function cutNameIntoWords(Node $node): array
    {
        return preg_split(
            '/(?=[A-Z])/', 
            $node->name, 
            -1, 
            PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY
        );
    }
}
