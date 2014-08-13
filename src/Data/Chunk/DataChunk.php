<?php

namespace Shrikeh\Macaroons\Data\Chunk;

use \Shrikeh\Macaroons\Data\Chunk;
use \Shrikeh\Macaroons\Data\Chunk\ChunkException;

class DataChunk implements Chunk
{
    private $field;

    private $value;

    public function __construct($field, $value)
    {
        $this->field    = $field;
        $this->value    = $value;
    }

    public function render()
    {
      return (string) $this->getField() . ' ' . $this->getValue();
    }

    public function __toString()
    {
        return $this->render();
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getField()
    {
        return $this->field;
    }
}
