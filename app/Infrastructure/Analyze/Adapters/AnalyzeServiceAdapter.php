<?php

namespace App\Infrastructure\Analyze\Adapters;

use PhpParser\Parser;
use PhpParser\NodeTraverser;
use App\Domain\Entities\FileEntity;
use App\Domain\Ports\AnalyzeService;
use App\Domain\Aggregators\FileAggregator;
use App\Domain\Aggregators\WordAggregator;
use App\Infrastructure\Analyze\Visitors\ClassVisitor;
use App\Infrastructure\Analyze\Mappers\AnalyzeServiceMapper;

class AnalyzeServiceAdapter implements AnalyzeService
{
    public function __construct(
        private Parser $parser,
        private AnalyzeServiceMapper $mapper,
    ) {}

    public function getWords(FileAggregator $fileAggregator, bool $withMethod): WordAggregator
    {
        $files = $fileAggregator->files();

        foreach ($files as $file) {
            $this->getFileWords($file, $withMethod);
        }

        return $this->mapper->aggregate();
    }

    private function getFileWords(FileEntity $file, bool $withMethod)
    {
        $traverser = new NodeTraverser();

        $visitor = $this->addVisitor($traverser, $withMethod);

        $this->traverseVisitor($traverser, $file);

        $this->mapper->map($visitor->words);
    }

    private function addVisitor(NodeTraverser $traverser, bool $withMethod): ClassVisitor
    {
        $visitor = new ClassVisitor($withMethod);

        $traverser->addVisitor($visitor);

        return $visitor;
    }

    private function traverseVisitor(NodeTraverser $traverser, $file): void
    {
        $contents = $file->contents;

        $nodes = $this->parser->parse($contents);

        $traverser->traverse($nodes);
    }
}
