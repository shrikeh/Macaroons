<?php

namespace Shrikeh\Macaroons\Data\Chunk;

use \Shrikeh\Macaroons\Data\Chunk;

class DataChunk implements Chunk
{
    private $header;

    private $field;

    private $value;

    public function __construct($header, $field, $value)
    {
        $this->header   = $header;
        $this->field    = $field;
        $this->value    = $value;
    }

    public function __toString()
    {
        $return = array(
            (string) $this->getHeader(),
            (string) $this->getField(),
            (string) $this->getValue()
        );
        return implode(' ', $return);
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getField()
    {
        return $this->field;
    }

    public function getHeader()
    {
        return $this->header;
    }
}
