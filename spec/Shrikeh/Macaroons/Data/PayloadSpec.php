<?php

namespace spec\Shrikeh\Macaroons\Data;

use \PhpSpec\ObjectBehavior;
use \Prophecy\Argument;
use \Shrikeh\Macaroons\Packet;
use \Shrikeh\Macaroons\Data\Chunk;
use \Shrikeh\Macaroons\Data\ChunkFactory;

class PayloadSpec extends ObjectBehavior
{
    public function let(ChunkFactory $factory)
    {

    }

    function it_returns_a_data_chunk_for_the_packet(
        ChunkFactory $factory,
        Packet $packet,
        Chunk $chunk
    ) {
        $payload = '0013field some data0021otherfield more and more data';
        $this->beConstructedWith($factory, $payload);
        $factory->getPacketChunk($packet, $payload)->willReturn($chunk);
        $this[$packet]->shouldReturn($chunk);
    }

    function it_implements_array_access(
        ChunkFactory $factory,
        Packet $packet,
        Chunk $chunk

    ) {
        $payload = '0013field some data0021otherfield more and more data';
        $this->beConstructedWith($factory, $payload);
        $factory->getPacketChunk($packet, $payload)->willReturn($chunk);
        $this[$packet]->shouldReturn($chunk);
    }

}
