<?php

namespace App\Application\UseCases;

use Throwable;
use App\Domain\Ports\FileService;
use App\Domain\Ports\AnalyzeService;
use App\Application\UseCases\InspectInput;
use App\Application\UseCases\InspectOutput;

class InspectHandler
{
    public function __construct(
        private FileService $fileService,
        private AnalyzeService $analyzeService,
    ) {
    }

    public function handle(
        InspectInput $input,
        InspectOutput $output,
    ): void {

        try {

            $output->hello();

            $fileAggregator = $this->fileService->all(
                path: $input->path(),
            );

            $wordsAggregator = $this->analyzeService->getWords(
                fileAggregator: $fileAggregator,
                withMethod: $input->withMethod(),
            );

            $output->present($wordsAggregator);

        } catch (Throwable $th) {
            $output->error($th);
        }
    }
}
