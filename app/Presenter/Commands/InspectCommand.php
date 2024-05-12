<?php

namespace App\Presenter\Commands;

use Termwind\HtmlRenderer;
use Illuminate\View\Factory as ViewFactory;
use LaravelZero\Framework\Commands\Command;
use App\Application\UseCases\InspectHandler;

class InspectCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'inspect {path} {--with-method}';

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
    public function handle(
        InspectHandler $inspectHandler,
        InspectCommandOutput $inspectCommandOutput,
    ) {
        $inspectHandler->handle(
            new InspectCommandInput(
                path: $this->argument('path'),
                withMethod: $this->option('with-method'),
            ),
            $inspectCommandOutput
        );
    }
}
