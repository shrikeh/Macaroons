<?php

namespace spec\Shrikeh\Macaroons\Data;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use \Shrikeh\Macaroons\Data\ChunkFactory;
use \Shrikeh\Macaroons\Packet;
use \Shrikeh\Macaroons\Data\Chunk;
use \Shrikeh\Macaroons\Data\Payload;

class PayloadGeneratorSpec extends ObjectBehavior
{
    function it_generates_a_payload(
        Chunk $firstField,
        Chunk $secondField
    ) {
        $firstField->__toString()->willReturn('field some data');
        $secondField->__toString()->willReturn('otherfield more and more data');
        $factory = new ChunkFactory();
        $this->beConstructedWith($factory);
        $payload = new Payload(
            $factory,
            '0013field some data0021otherfield more and more data'
        );
        $this->generate(array($firstField, $secondField))->shouldBeLike($payload);
    }
}
