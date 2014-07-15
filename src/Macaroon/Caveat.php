<?php

namespace Shrikeh\Macaroons\Macaroon;

class Caveat
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }
}
