<?php

namespace App\Visitors;

use PhpParser\Node;
use PhpParser\NodeVisitorAbstract;
use DeGraciaMathieu\FileExplorer\File;

final class ClassVisitor extends NodeVisitorAbstract
{
    public function __construct(
        public array $words = [],
    ) {}

    public function leaveNode(Node $node): void
    {
        if (! $node instanceof Node\Expr\Variable) {
            return;
        }

        $words = preg_split(
            '/(?=[A-Z])/', 
            $node->name, 
            -1, 
            PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY
        );

        $this->words = $words;
    }
}
