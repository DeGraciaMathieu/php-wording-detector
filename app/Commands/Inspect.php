<?php

namespace App\Commands;

use LaravelZero\Framework\Commands\Command;
use DeGraciaMathieu\FileExplorer\FileFinder;
use PhpParser\NodeTraverser;
use App\Visitors\ClassVisitor;
use PhpParser\Parser;

class Inspect extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'inspect';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('❀ PHP Wording Detector ❀');

        $fileFinder = new FileFinder(
            basePath: __DIR__, 
        );

        $files = $fileFinder->getFiles(
            paths: '../../tmp',
        );

        $words = [];

        foreach ($files as $file) {

            $traverser = new NodeTraverser();

            $visitor = new ClassVisitor();

            $traverser->addVisitor($visitor);

            $contents = $file->contents();

            $nodes = app(Parser::class)->parse($contents);

            $traverser->traverse($nodes);

            $words[] = $visitor->words;
        }

        dd($words);
    }
}
