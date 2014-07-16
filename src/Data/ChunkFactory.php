<?php
namespace Shrikeh\Macaroons\Data;

use \Shrikeh\Macaroons\Packet;
use \Shrikeh\Macaroons\Data\Chunk\DataChunk;

class ChunkFactory
{
    public function getPacketChunk(Packet $packet, $payload)
    {
        $chunkData = $packet->parse($payload);
        $chunk =  new DataChunk(
            $chunkData['header'],
            $chunkData['field'],
            $chunkData['value']
        );
        return $chunk;
    }
}
