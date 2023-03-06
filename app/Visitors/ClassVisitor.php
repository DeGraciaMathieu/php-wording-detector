<?php

namespace App\Visitors;

use PhpParser\Node;
use App\Nodes\NodeValidator;
use App\Nodes\NodeExtractor;
use PhpParser\NodeVisitorAbstract;

final class ClassVisitor extends NodeVisitorAbstract
{
	public array $words = [];

    public function leaveNode(Node $node): void
    {
        if (! NodeValidator::isAVariable($node)) {
            return;  
        }

        $words = NodeExtractor::cutNameIntoWords($node);

        $this->words[] = $words;
    }
}
