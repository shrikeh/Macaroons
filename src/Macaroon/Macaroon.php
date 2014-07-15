<?php

namespace Shrikeh\Macaroons\Macaroon;

use \Shrikeh\Macaroons\Macaroon as MacaroonInterface;
use \Shrikeh\Macaroons\Packet;

class Macaroon implements MacaroonInterface
{
    private $id;

    private $locationHint;

    public function __construct(Packet $id, Packet $locationHint)
    {
        $this->id = $id;
        $this->locationHint = $locationHint;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getLocation()
    {
        return $this->locationHint;
    }

    public function append(Packet $packet)
    {

    }

    public function parse(Packet $packet)
    {

    }
}
