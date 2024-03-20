<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ToolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tools')->insert([
            'nama_tools' => 'Succes',
            'jumlah_tools'=> '20',
            'status_tools'=>'Sudah di kalibrasi',
            'kalibrasi_date'=>'2024-01-02',
        ]);
    }
}
