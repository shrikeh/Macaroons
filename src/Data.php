<?php
namespace Shrikeh\Macaroons;

use \Shrikeh\Macaroons\Packet;

interface Data
{
    public function getValue(Packet $packet);

    public function getField(Packet $packet);
}