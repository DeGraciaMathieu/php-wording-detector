<?php

namespace App\Renderers;

use Termwind\HtmlRenderer;
use Symfony\Component\Console\Output\OutputInterface;
use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\View\Factory as ViewFactory;

class ViewRenderer
{
    public function __construct(
        private ViewFactory $view,
        private HtmlRenderer $htmlRenderer,
    ) {}

    public function display(array $words): void
    {
        $html = $this->makeHtml($words);

        $this->renderHtml($html);
    }

    protected function makeHtml(array $words): ViewContract
    {
        return $this->view->make('inspect', [
            'words' => $words,
        ]);
    }

    private function renderHtml(ViewContract $html): void
    {
        $this->htmlRenderer->render($html, OutputInterface::OUTPUT_NORMAL);
    }
}
