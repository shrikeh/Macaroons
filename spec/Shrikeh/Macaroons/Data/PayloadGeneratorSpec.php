<?php

namespace spec\Shrikeh\Macaroons\Data;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use \Shrikeh\Macaroons\Data\ChunkFactory;
use \Shrikeh\Macaroons\Packet\Packet;
use \Shrikeh\Macaroons\PacketGenerator;
use \Shrikeh\Macaroons\Data\Chunk;
use \Shrikeh\Macaroons\Data\Payload;

class PayloadGeneratorSpec extends ObjectBehavior
{
    function it_generates_a_payload(
        Chunk $firstChunk,
        Chunk $secondChunk,
        Packet $firstPacket,
        Packet $secondPacket,
        PacketGenerator $generator
    ) {
        $chunkFactory = new ChunkFactory();

        $firstChunk->__toString()->willReturn('field some data');
        $secondChunk->__toString()->willReturn('otherfield more and more data');

        $generator->fromChunk($firstChunk)->willReturn($firstPacket);
        $generator->fromChunk($secondChunk)->willReturn($secondPacket);

        $firstPacket->__toString()->willReturn('0013');
        $secondPacket->__toString()->willReturn('0021');

        $this->beConstructedWith($chunkFactory, $generator);

        $payload = new Payload(
            $chunkFactory,
            '0013field some data0021otherfield more and more data'
        );
        $this->generate(array($firstChunk, $secondChunk))->shouldBeLike($payload);
    }
}
