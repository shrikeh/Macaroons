<?php

namespace Shrikeh\Macaroons\Data;

use \Shrikeh\Macaroons\Data;
use \Shrikeh\Macaroons\Packet;

class Payload implements Data
{
    private $payload;

    public function __construct($payload)
    {
        $this->payload = $payload;
    }

    public function getValue(Packet $packet)
    {
        return substr(
            $this->payload,
            $packet->getValueStart(),
            $packet->getValueLength()
        );
    }

    public function getField(Packet $packet)
    {
        return substr(
            $this->payload,
            $packet->getFieldStart(),
            $packet->getFieldLength()
        );   
    }

}