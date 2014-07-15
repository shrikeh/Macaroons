<?php

namespace Shrikeh\Macaroons;

interface Packet
{
    
    public function getStart();

    public function getTotalLength();

    public function getHeaderLength();

    public function getValueStart();

    public function getValueLength();

    public function getValueEnd();

    public function getFieldStart();

    public function getFieldLength();

    public function getFieldEnd();
}