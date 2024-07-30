<?php

namespace App\Pakaian;

class Kaos extends Pakaian
{
    protected $size;

    public function __construct(string $jenis, string $merk, string $size)
    {
        parent::__construct($jenis, $merk);
        $this->size = $size;
    }

    public function getSize(): string
    {
        return $this->size;
    }

    public function greeting(): string
    {
        return "Hello, I am a {$this->getJenis()} from {$this->getMerk()} in size {$this->getSize()}.";
    }
}