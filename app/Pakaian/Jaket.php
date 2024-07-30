<?php

namespace App\Pakaian;

class Jaket extends Pakaian
{
    protected $material;

    public function __construct(string $jenis, string $merk, string $material)
    {
        parent::__construct($jenis, $merk);
        $this->material = $material;
    }

    public function getMaterial(): string
    {
        return $this->material;
    }

    public function greeting(): string
    {
        return "Hello, I am a {$this->getJenis()} from {$this->getMerk()} made of {$this->getMaterial()}.";
    }
}
