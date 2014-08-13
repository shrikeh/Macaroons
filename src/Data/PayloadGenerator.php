<?php

namespace Shrikeh\Macaroons\Data;

use \Shrikeh\Macaroons\Data\ChunkFactory;
use \Shrikeh\Macaroons\PacketGenerator;
use \Shrikeh\Macaroons\Data\Payload;

class PayloadGenerator
{
    private $chunkFactory;

    private $packetGenerator;

    public function __construct(
        ChunkFactory $chunkFactory,
        PacketGenerator $packetGenerator
    ) {
        $this->chunkFactory = $chunkFactory;
        $this->packetGenerator = $packetGenerator;
    }

    public function generate($chunks)
    {
        $payload = '';
        foreach ($chunks as $chunk) {
            $packet = $this->packetGenerator->fromChunk($chunk);
            $payload.= (string) $packet . (string) $chunk;
        }
        return new Payload($this->chunkFactory, $payload);
    }

}
