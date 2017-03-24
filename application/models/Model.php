<?php

class Model
{
    public $text;

    public function __construct() {
        $this->text = '';
    }

    public function __toString() {
        return $this->text;
    }

}