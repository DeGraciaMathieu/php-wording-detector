<?php

namespace App\Visitors;

use PhpParser\Node;
use App\Nodes\NodeValidator;
use App\Nodes\NodeExtractor;
use PhpParser\NodeVisitorAbstract;

final class ClassVisitor extends NodeVisitorAbstract
{
	public array $words = [];

    public function __construct(
        private bool $withMethod,
    ) {}

    public function leaveNode(Node $node): void
    {
        if ($this->mustParseThisNode($node)) {

            $words = NodeExtractor::cutNameIntoWords($node);

            $this->words[] = $words;
        }
    }

    private function mustParseThisNode(Node $node): bool
    {
        if (NodeValidator::isAVariable($node)) {
            return true;
        }

        return $this->withMethod 
            ? NodeValidator::isAMethod($node) 
            : false;
    }
}
