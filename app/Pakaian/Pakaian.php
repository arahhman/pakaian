<?php

namespace App\Pakaian;

class Pakaian implements PakaianInterface
{
    protected $jenis;
    protected $merk;

    public function __construct(string $jenis, string $merk)
    {
        $this->jenis = $jenis;
        $this->merk = $merk;
    }

    public function getJenis(): string
    {
        return $this->jenis;
    }

    public function getMerk(): string
    {
        return $this->merk;
    }
}
