<?php

namespace spec\Shrikeh\Macaroons\Packet;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PacketSpec extends ObjectBehavior
{
    public function let()
    {
        $start = 4;
        $headerLength = 32;
        $totalLength = 64;
        $this->beConstructedWith($start, $headerLength, $totalLength);
    }

    function it_returns_the_start()
    {
        $this->getStart()->shouldReturn(4);
    }

    function it_returns_the_total_length()
    {
        $this->getTotalLength()->shouldReturn(64);
    }

    function it_returns_the_header_length()
    {
        $this->getHeaderLength()->shouldReturn(32);
    }

    function it_returns_the_data_payload_start()
    {
        $this->getValueStart()->shouldReturn(36);
    }

    function it_returns_the_data_payload_end()
    {
        $this->getValueEnd()->shouldReturn(68);
    }

    function it_returns_the_field_start()
    {
        $this->getFieldStart()->shouldReturn(8);
    }

    function it_returns_the_field_end()
    {
        $this->getFieldEnd()->shouldReturn(35);
    }
}
