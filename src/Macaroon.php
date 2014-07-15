<?php

namespace Shrikeh\Macaroons;

use \Shrikeh\Macaroons\Packet;

interface Macaroon
{
    public function getId();

    public function getLocation();

    public function append(Packet $packet);

    public function parse(Packet $packet);
}