<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuLanjutanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menu_lanjutans')->insert([
            'nip' => '200602036',
            'nama' => 'Burhan Admin',
            'jabatan' => 'Operator',
        ]);
    }
}
