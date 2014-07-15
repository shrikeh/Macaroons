<?php

namespace spec\Shrikeh\Macaroons\Macaroon;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CaveatSpec extends ObjectBehavior
{
    function it_has_an_id()
    {
        $id = 'someId';
        $this->beConstructedWith($id);
        $this->getId()->shouldReturn($id);
    }
    
}
