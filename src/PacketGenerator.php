<?php

namespace Shrikeh\Macaroons;

use \Shrikeh\Macaroons\Data\Chunk;
use \Shrikeh\Macaroons\Packet\Packet as DataPacket;

class PacketGenerator
{
    const DEFAULT_BUFFER_SIZE = 4;

    private $bufferSize;

    public function __construct($bufferSize = self::DEFAULT_BUFFER_SIZE)
    {
      $this->bufferSize = $bufferSize;
    }

    public function fromChunk(Chunk $chunk, $start = 0)
    {
        $fieldLength = strlen($chunk->getField());
        $valueLength = strlen($chunk->getValue());

        return new DataPacket(
            $start,
            $fieldLength,
            $valueLength,
            $this->getBufferSize()
        );
    }

    public function getBufferSize()
    {
      return $this->bufferSize;
    }
}
