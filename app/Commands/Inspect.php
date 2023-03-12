<?php

namespace App\Commands;

use LaravelZero\Framework\Commands\Command;
use DeGraciaMathieu\FileExplorer\FileFinder;
use PhpParser\NodeTraverser;
use App\Visitors\ClassVisitor;
use PhpParser\Parser;
use App\Bags\WordsBag;
use function Termwind\{render};
use Generator;

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
    protected $description = 'summary analysis';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('❀ PHP Wording Detector ❀');

        $files = $this->getFilesFromPath();

        $wordsBag = $this->analyseFiles($files);

        $this->render($wordsBag);
    }

    private function getFilesFromPath(): Generator
    {
        $fileFinder = new FileFinder(
            basePath: getcwd(), 
        );

        return $fileFinder->getFiles(
            paths: $this->argument('path'),
        );
    }

    private function analyseFiles(Generator $files): WordsBag
    {
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

        return $wordsBag;
    }

    private function render(WordsBag $wordsBag): void
    {
        $wordsBag->sort();

        render(view('inspect', [
            'words' => $wordsBag->get(),
        ]));
    }
}
