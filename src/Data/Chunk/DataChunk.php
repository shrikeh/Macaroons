<?php

namespace Shrikeh\Macaroons\Data\Chunk;

use \Shrikeh\Macaroons\Data\Chunk;
use \Shrikeh\Macaroons\Data\Chunk\ChunkException;

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

        $chunkLength = strlen($this->render()) -1;
        $headerLength = hexdec($this->header);
        if ($headerLength !== $chunkLength) {
            throw new ChunkException("Header does not match field/value length: '$headerLength:$chunkLength'");
        }
    }

    public function render()
    {
        $return = array(
            (string) $this->getHeader(),
            (string) $this->getField(),
            (string) $this->getValue()
        );
        return implode(' ', $return);
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

    public function getHeader()
    {
        return $this->header;
    }
}
