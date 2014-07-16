<?php

namespace spec\Shrikeh\Macaroons\Data;

use \PhpSpec\ObjectBehavior;
use \Prophecy\Argument;
use \Shrikeh\Macaroons\Data\Chunk\DataChunk;
use \Shrikeh\Macaroons\Packet;

class ChunkFactorySpec extends ObjectBehavior
{
    function it_returns_a_chunk(Packet $packet)
    {
        $payload = '0013field some data0021otherfield more and more data';

        $array = array(
            'header'    => '0021',
            'field'     => 'otherfield',
            'value'     => 'more and more data'
        );
        $chunk = new DataChunk(
            $array['header'],
            $array['field'],
            $array['value']
        );
        $packet->parse($payload)->willReturn($array);

        $this->getPacketChunk($packet, $payload)->shouldBeLike($chunk);
    }
}
