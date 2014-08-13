<?php

namespace Shrikeh\Macaroons\Data;

use \Shrikeh\Macaroons\Data\ChunkFactory;
use \Shrikeh\Macaroons\Data\Payload;

class PayloadGenerator
{
    private $chunkFactory;

    public function __construct(ChunkFactory $factory)
    {
        $this->chunkFactory = $factory;
    }

    public function generate($chunks)
    {
        $payload = '0013field some data0021otherfield more and more data';
        foreach ($chunks as $chunk) {
            $fieldData = (string) $chunk;

        }
        return new Payload($this->chunkFactory, $payload);
    }

}
