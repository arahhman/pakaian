<?php

namespace App\Pakaian;

interface PakaianInterface
{
    public function getJenis(): string;
    public function getMerk(): string;
}
