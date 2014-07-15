<?php

namespace spec\Shrikeh\Macaroons;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MacaroonSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Shrikeh\Macaroons\Macaroon');
    }
}
