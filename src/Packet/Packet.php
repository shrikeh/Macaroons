<?php

namespace Shrikeh\Macaroons\Packet;

use \Shrikeh\Macaroons\Packet as PacketInterface;
use \Shrikeh\Macaroons\Data\Slice;

class Packet implements PacketInterface
{
    private $start;

    private $fieldLength;

    private $totalLength;

    private $bufferLength;


    public function __construct($start, $fieldLength, $valueLength, $bufferLength)
    {
        $this->start        = $start;
        $this->fieldLength  = $fieldLength;
        $this->valueLength  = $valueLength;
        $this->bufferLength = $bufferLength;
    }

    public function getStart()
    {
        return $this->start;
    }


    public function getHeaderLength()
    {
        return $this->getBufferLength() + $this->getFieldLength() + 1;
    }

    public function getTotalLength()
    {
        return $this->getHeaderLength() + $this->getValueLength() + 1;
    }

    public function parse($data)
    {
        $header = substr($data, $this->getStart(), $this->getBufferLength());
        $field  = substr($data, $this->getFieldStart(), $this->getFieldLength());
        $value  = substr($data, $this->getValueStart(), $this->getValueLength());
        return array(
            'header' => $header,
            'field'  => $field,
            'value'  => $value,
        );
    }

    private function getFieldLength()
    {
        return $this->fieldLength;
    }

    private function getValueLength()
    {
        return $this->valueLength;
    }

    private function getBufferLength()
    {
        return $this->bufferLength;
    }

    private function getFieldStart()
    {
        return $this->getStart() + $this->getBufferLength();
    }

    private function getFieldEnd()
    {
        return $this->getFieldStart() + $this->getFieldLength();
    }

    private function getValueStart()
    {
        return $this->getFieldEnd() + 1;
    }

    private function getValueEnd()
    {
        return $this->getValueStart() + $this->getValueLength();
    }






/*

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
        return $this->getStart() + $this->getBufferLength();
    }

    private function getFieldLength()
    {
        return $this->fieldLength;
    }

    private function getFieldEnd()
    {
        return $this->getStart() + $this->getHeaderLength() - 1;
    }
*/
}
