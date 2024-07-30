<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Pakaian;

class PakaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pakaian')->insert([
            ['jenis' => 'Kaos', 'merk' => 'Adidas'],
            ['jenis' => 'Jaket', 'merk' => 'Nike'],
            ['jenis' => 'Kemeja', 'merk' => 'Zara'],
            ['jenis' => 'Rok', 'merk' => 'H&M'],
        ]);
    }
}
