<?php

namespace Shrikeh\Macaroons\Packet;

use \Shrikeh\Macaroons\Packet as PacketInterface;

class Packet implements PacketInterface
{
    private $start;

    private $totalLength;

    const HEADER_LENGTH = 4;

    public function __construct($start, $headerLength, $totalLength)
    {
        $this->start = $start;
        $this->headerLength = $headerLength;
        $this->totalLength = $totalLength;
    }

    public function getStart()
    {
        return $this->start;
    }

    public function getHeaderLength()
    {
        return $this->headerLength;
    }

    public function getTotalLength()
    {
        return $this->totalLength;
    }

    public function getValueStart()
    {
        return $this->getStart() + $this->getHeaderLength();
    }

    public function getValueLength()
    {
        return $this->getValueEnd() - $this->getValueStart();
    }

    public function getValueEnd()
    {
        return $this->getStart() + $this->getTotalLength();
    }

    public function getFieldStart()
    {
        return $this->getStart() + self::HEADER_LENGTH;
    }

    public function getFieldLength()
    {
        return $this->getFieldEnd() - $this->getFieldStart();
    }

    public function getFieldEnd()
    {
        return $this->getStart() + $this->getHeaderLength() - 1;
    }
}
