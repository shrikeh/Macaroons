<?php

namespace Shrikeh\Macaroons;

interface Packet
{
    
    public function getStart();

    public function getTotalLength();

    public function getHeaderLength();

    public function parse($data);
}