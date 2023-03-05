<?php

namespace App\Commands;

use LaravelZero\Framework\Commands\Command;
use DeGraciaMathieu\FileExplorer\FileFinder;
use PhpParser\NodeTraverser;
use App\Visitors\ClassVisitor;
use PhpParser\Parser;
use App\Bags\WordsBag;
use function Termwind\{render};

class Inspect extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'inspect {path}';

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
            basePath: dirname(app_path()), 
        );

        $files = $fileFinder->getFiles(
            paths: $this->argument('path'),
        );

        $wordsBag = new WordsBag();

        foreach ($files as $file) {

            $traverser = new NodeTraverser();

            $visitor = new ClassVisitor();

            $traverser->addVisitor($visitor);

            $contents = $file->contents();

            $nodes = app(Parser::class)->parse($contents);

            $traverser->traverse($nodes);

            foreach ($visitor->words as $words) {
                $wordsBag->add($words);
            }
        }

        $wordsBag->sort();

        $words = $wordsBag->get();

        render(view('inspect', [
            'words' => $words,
        ]));
    }
}
