<?php

namespace App\Presenter\Commands;

use Throwable;
use Termwind\HtmlRenderer;
use function Laravel\Prompts\note;
use function Laravel\Prompts\error;
use App\Domain\Aggregators\WordAggregator;
use Illuminate\View\Factory as ViewFactory;
use App\Application\UseCases\InspectOutput;
use Illuminate\Contracts\View\View as ViewContract;
use Symfony\Component\Console\Output\OutputInterface;

class InspectCommandOutput implements InspectOutput
{
    public function __construct(
        private ViewFactory $view,
        private HtmlRenderer $htmlRenderer,
    ) {
    }

    public function hello(): void
    {
        note('❀ PHP Wording Detector ❀');
    }

    public function present(WordAggregator $wordAggregator): void
    {
        $wordAggregator->sort();

        $html = $this->makeHtml($wordAggregator);

        $this->renderHtml($html);
    }

    public function error(Throwable $th): void
    {
        error($th);
    }

    private function makeHtml(WordAggregator $wordAggregator): ViewContract
    {
        $words = $wordAggregator->words();

        return $this->view->make('inspect', [
            'words' => $words,
        ]);
    }

    private function renderHtml(ViewContract $html): void
    {
        $this->htmlRenderer->render($html, OutputInterface::OUTPUT_NORMAL);
    }
}
