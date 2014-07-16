<?php

namespace Shrikeh\Macaroons\Data;

interface Chunk
{
    public function __toString();

    public function getValue();

    public function getField();

    public function getHeader();
}
