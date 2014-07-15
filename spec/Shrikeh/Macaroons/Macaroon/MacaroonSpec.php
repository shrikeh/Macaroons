<?php

namespace spec\Shrikeh\Macaroons\Macaroon;

use \PhpSpec\ObjectBehavior;
use \Prophecy\Argument;
use \Shrikeh\Macaroons\Packet;

class MacaroonSpec extends ObjectBehavior
{
    public function let(Packet $id, Packet $location)
    {
        $this->beConstructedWith($id, $location);
    }

    function it_returns_the_id($id)
    {
        $this->getId()->shouldReturn($id);
    }

    function it_returns_the_location($location)
    {
        $this->getLocation()->shouldReturn($location);
    }

    function it_returns_the_signature()
    {
        //$this->getSignature()->shouldReturn
    }
}
