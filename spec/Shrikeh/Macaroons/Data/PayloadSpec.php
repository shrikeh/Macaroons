<?php

namespace spec\Shrikeh\Macaroons\Data;

use \PhpSpec\ObjectBehavior;
use \Prophecy\Argument;
use \Shrikeh\Macaroons\Packet;

class PayloadSpec extends ObjectBehavior
{
    function it_returns_a_string_of_data(Packet $packet)
    {
        $this->beConstructedWith('0013field some data');
        $packet->getValueStart()->willReturn(10);
        $packet->getValueLength()->willReturn(9);
        $this->getValue($packet)->shouldReturn('some data');
    }

    function it_returns_a_field_name(Packet $packet)
    {
        $this->beConstructedWith('0013field some data');
        $packet->getFieldStart()->willReturn(4);
        $packet->getFieldLength()->willReturn(5);
        $this->getField($packet)->shouldReturn('field');
    }
}
