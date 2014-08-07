<?php

namespace Shrikeh\Macaroons\Packet;

use \Shrikeh\Macaroons\Packet as PacketInterface;
use \Shrikeh\Macaroons\Data\Slice;

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

    public function parse($data)
    {
        $header = substr($data, $this->getStart(), self::HEADER_LENGTH);
        $field  = substr($data, $this->getFieldStart(), $this->getFieldLength());
        $value  = substr($data, $this->getValueStart(), $this->getValueLength());
        return array(
            'header' => $header,
            'field'  => $field,
            'value'  => $value,
        );
    }

    private function getValueStart()
    {
        return $this->getStart() + $this->getHeaderLength();
    }

    private function getValueLength()
    {
        return $this->getValueEnd() - $this->getValueStart();
    }

    private function getValueEnd()
    {
        return $this->getStart() + $this->getTotalLength();
    }

    private function getFieldStart()
    {
        return $this->getStart() + self::HEADER_LENGTH;
    }

    private function getFieldLength()
    {
        return $this->getFieldEnd() - $this->getFieldStart();
    }

    private function getFieldEnd()
    {
        return $this->getStart() + $this->getHeaderLength() - 1;
    }
}
