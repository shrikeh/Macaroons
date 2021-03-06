<?php

namespace spec\Shrikeh\Macaroons\Data\Chunk;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DataChunkSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('field', 'some data');
    }

    function it_should_return_the_value()
    {
        $this->getValue()->shouldReturn('some data');
    }

    function it_should_return_the_field()
    {
        $this->getField()->shouldReturn('field');
    }

    function it_should_be_to_stringable()
    {
        $this->__toString()->shouldReturn('field some data');
    }
}
