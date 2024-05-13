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

class InspectHandlerTest extends MockeryTestCase
{
    #[Test]
    public function it_can_find_the_number_of_words_in_files(): void
    {
        $handler = new InspectHandler(
            $this->mockFileService(),
            $this->mockAnalyzeService(),
        );

        $handler->handle(
            $this->mockInputInterface(),
            $this->mockOutputInterface(),
        );
    }

    private function mockFileService(): FileService
    {
        $fileService = Mockery::mock(FileService::class);

        $fileService->expects('all')->andReturn($this->makeFileAggregator());

        return $fileService;
    }

    private function makeFileAggregator(): FileAggregator
    {
        return fileAggregator()->withFile()->build();
    }

    private function mockAnalyzeService(): AnalyzeService
    {
        return Mockery::mock(AnalyzeService::class)->shouldIgnoreMissing();
    }

    private function mockInputInterface(): InspectInput
    {
        $input = Mockery::mock(InspectInput::class);

        $input->expects('path')->andReturn(Path::from('.'));
        $input->expects('withMethod')->andReturn(false);

        return $input;
    }

    private function mockOutputInterface(): InspectOutput
    {
        $output = Mockery::mock(InspectOutput::class)->shouldIgnoreMissing();

        $output->expects('error')
            ->never()
            ->withAnyArgs()
            ->andReturnUsing(function ($th) {
                $this->fail('Unexpected call to error with exception: ' . $th->getMessage());
            });

        $output->expects('present')
            ->withArgs(function ($argument) {
                return $argument instanceof WordAggregator;
            });

        return $output;
    }
}
