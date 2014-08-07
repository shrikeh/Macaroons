<?php
namespace Shrikeh\Macaroons;

use \Shrikeh\Macaroons\Packet;

interface Data extends \ArrayAccess
{
    public function getChunkFor(Packet $packet);
}
