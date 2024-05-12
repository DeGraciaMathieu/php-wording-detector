<?php

namespace Tests\Unit\Application;

use Mockery;
use App\Domain\Ports\FileService;
use App\Domain\ValueObjects\Path;
use App\Domain\Ports\AnalyzeService;
use PHPUnit\Framework\Attributes\Test;
use App\Application\UseCases\InspectInput;
use App\Domain\Aggregators\FileAggregator;
use App\Domain\Aggregators\WordAggregator;
use App\Application\UseCases\InspectOutput;
use App\Application\UseCases\InspectHandler;
use Mockery\Adapter\Phpunit\MockeryTestCase;

class InspectTestCase extends MockeryTestCase
{
    private FileService $fileService;
    private AnalyzeService $analyzeService;
    private InspectInput $input;
    private InspectOutput $output;

    protected function mockeryTestSetUp(): void
    {
        $this->fileService = Mockery::mock(FileService::class);
        $this->analyzeService = Mockery::mock(AnalyzeService::class)->shouldIgnoreMissing();
        $this->input = Mockery::mock(InspectInput::class);
        $this->output = Mockery::mock(InspectOutput::class)->shouldIgnoreMissing();
    }

    #[Test]
    public function it_can_find_the_number_of_words_in_files(): void
    {
        $this->shouldNotPresentAnyErrors();

        $this->setupExpectationsForSuccessScenario();

        $this->runUseCase();
    }

    private function shouldNotPresentAnyErrors(): void
    {
        $this->output->expects('error')
            ->never()
            ->withAnyArgs()
            ->andReturnUsing(function ($th) {
                $this->fail('Unexpected call to error with exception: ' . $th->getMessage());
            });
    }

    private function setupExpectationsForSuccessScenario(): void
    {
        $this->fileService->expects('all')
            ->andReturn($this->makeFileAggregator());

        $this->input->expects('path')
            ->andReturn(Path::from('.'));

        $this->input->expects('withMethod')
            ->andReturn(false);

        $this->output->expects('present')
            ->withArgs(function ($argument) {
                return $argument instanceof WordAggregator;
            });
    }

    private function runUseCase(): void
    {
        $handler = new InspectHandler(
            $this->fileService,
            $this->analyzeService,
        );

        $handler->handle($this->input, $this->output);
    }

    private function makeFileAggregator(): FileAggregator
    {
        return $this->fileAggregator()->withFile()->build();
    }

    protected function tearDown(): void
    {
        Mockery::close();
    }
}
