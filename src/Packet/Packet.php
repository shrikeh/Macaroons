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

        $packetSize = $this->getTotalLength() - 1;
        $bufferMax = pow(16, $bufferLength) - 1;
        if ($packetSize > $bufferMax) {
            throw new \OutOfBoundsException(
                "Packet size $packetSize exceeds the maxmimum buffer size of $bufferMax"
            );
        }
    }

    public function __toString()
    {
        return (string) $this->toHex();
    }

    public function toHex()
    {
        return str_pad(
            dechex($this->getTotalLength()),
            $this->getBufferLength(),
            '0',
            STR_PAD_LEFT
        );
    }

    public function getStart()
    {
        return $this->start;
    }


    public function getHeaderLength()
    {
        return $this->getBufferLength() + $this->getFieldLength();
    }

    public function getTotalLength()
    {
        return $this->getHeaderLength() + 1 + $this->getValueLength();
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
}
