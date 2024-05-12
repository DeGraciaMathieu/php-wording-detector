<?php

namespace App\Infrastructure\Analyze\Visitors;

use PhpParser\Node;
use PhpParser\NodeVisitorAbstract;
use App\Infrastructure\Analyze\Nodes\NodeExtractor;
use App\Infrastructure\Analyze\Nodes\NodeValidator;

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

            $this->words = array_merge($this->words, $words);
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
