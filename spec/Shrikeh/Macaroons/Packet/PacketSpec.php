<?php

namespace spec\Shrikeh\Macaroons\Packet;

use \PhpSpec\ObjectBehavior;
use \Prophecy\Argument;

class PacketSpec extends ObjectBehavior
{
    public function let()
    {
        $start        = 4;
        $fieldLength  = 10;
        $valueLength  = 60;
        $bufferLength = 4;

        $this->beConstructedWith($start, $fieldLength, $valueLength, $bufferLength);
    }

    function it_returns_the_start()
    {
        $this->getStart()->shouldReturn(4);
    }

    function it_returns_the_total_length()
    {
        $this->getTotalLength()->shouldReturn(75);
    }

    function it_returns_the_header_length()
    {
        $this->getHeaderLength()->shouldReturn(14);
    }

    function it_returns_a_hex_string_if_tostringed()
    {
        $this->beConstructedWith(18, 10, 65420, 4);
        $this->__toString()->shouldReturn('ff9b');
    }

    function it_throws_an_OutOfBoundsException_if_larger_than_the_buffer()
    {
        $this->shouldThrow(
            new \OutOfBoundsException(
              'Packet size 65544 exceeds the maxmimum buffer size of 65535'
            ))
            ->during('__construct', [4, 10, 65530, 4]);
    }

    function it_returns_a_hex_value()
    {
        $this->beConstructedWith(0, 5, 9, 4);
        $this->toHex()->shouldReturn('0013');
    }

    function it_parses_a_payload()
    {
      $this->beConstructedWith(19, 10, 18, 4);
      $data = '0013field some data0021otherfield more and more data00';
      $this->parse($data)->shouldReturn(array(
        'header' => '0021',
        'field'  => 'otherfield',
        'value'  => 'more and more data',
      ));
    }
}
