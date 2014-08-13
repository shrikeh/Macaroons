<?php

namespace spec\Shrikeh\Macaroons;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use \Shrikeh\Macaroons\Data\Chunk;
use \Shrikeh\Macaroons\Packet\Packet;

class PacketGeneratorSpec extends ObjectBehavior
{

    function it_accepts_a_buffer_size()
    {
        $this->beConstructedWith(8);
        $this->getBufferSize()->shouldReturn(8);
    }

    function it_generates_a_packet_from_a_chunk(Chunk $chunk)
    {
        $chunk->getField()->willReturn('field');
        $chunk->getValue()->willReturn('some data');
        $packet = new Packet(0, 5, 9, 4);
        $this->fromChunk($chunk)->shouldBeLike($packet);
    }

    function it_generates_a_packet_with_correct_offset(Chunk $chunk)
    {
        $chunk->getField()->willReturn('otherfield');
        $chunk->getValue()->willReturn('more and more data');
        $packet = new Packet(19, 10, 18, 4);
        $this->fromChunk($chunk, 19)->shouldBeLike($packet);
    }
}
