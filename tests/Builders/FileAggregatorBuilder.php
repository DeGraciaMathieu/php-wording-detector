<?php

namespace Tests\Builders;

use App\Domain\Entities\FileEntity;
use App\Domain\Aggregators\FileAggregator;

class FileAggregatorBuilder
{
    private FileAggregator $fileAggregator;

    public function __construct() 
    {
        $this->fileAggregator = new FileAggregator();
    }

    public function withFile(): FileAggregatorBuilder
    {
        $this->fileAggregator->add($this->makeFileEntity());

        return $this;
    }

    public function build(): FileAggregator
    {
        return $this->fileAggregator;
    }

    private function makeFileEntity(): FileEntity
    {
        return FileEntity::from([
            'fullPath' => '.',
            'displayPath' => '.',
            'contents' => file_get_contents(__DIR__ . '/stubs/Foo.php'),
        ]);
    }
}
