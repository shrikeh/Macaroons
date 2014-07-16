<?php

namespace Shrikeh\Macaroons\Data;

use \Shrikeh\Macaroons\Data;
use \Shrikeh\Macaroons\Packet;
use \Shrikeh\Macaroons\Data\Chunk;

class Payload implements Data
{
    private $chunkFactory;

    private $payload;

    public function __construct(ChunkFactory $factory, $payload)
    {
        $this->chunkFactory = $factory;
        $this->payload = $payload;
    }

    public function __isset(Packet $packet)
    {

    }

    public function getChunkFor(Packet $packet)
    {
        return $this->getChunkFactory()->getPacketChunk(
            $packet,
            $this->payload
        );
    }

    public function offsetGet($packet)
    {
        return $this->getChunkFor($packet);
    }

    public function offsetSet($packet, $chunk)
    {

    }

    public function offsetUnset($packet)
    {

    }

    public function offsetExists($packet)
    {
        return $this->packetExists($packet);
    }

    private function packetExists(Packet $packet)
    {

    }

    private function getChunkFactory()
    {
        return $this->chunkFactory;
    }
}
