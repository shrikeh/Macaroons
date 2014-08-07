<?php

namespace spec\Shrikeh\Macaroons\Data;

use \PhpSpec\ObjectBehavior;
use \Prophecy\Argument;
use \Shrikeh\Macaroons\Packet;
use \Shrikeh\Macaroons\Data\ChunkFactory;

class PayloadSpec extends ObjectBehavior
{
    public function let(ChunkFactory $factory)
    {

    }

    function it_returns_a_data_chunk_for_the_packet(
        ChunkFactory $factory,
        Packet $packet
    ) {
        $payload = '0013field some data0021otherfield more and more data';
        $this->beConstructedWith($factory, $payload);
        $factory->getPacketChunk($packet, $payload)->shouldBeCalled();
        $this->getChunkFor($packet);
    }

    function it_implements_array_access(
        ChunkFactory $factory,
        Packet $packet
    ) {
        $payload = '0013field some data0021otherfield more and more data';
        $this->beConstructedWith($factory, $payload);
        $factory->getPacketChunk($packet, $payload)->shouldBeCalled();
        $this[]
    }

}
