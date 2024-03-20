<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RevisiGambarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('revisi_gambars')->insert([
            'id_project'=> '1',
            'status_revisi' => 'Succes',
            'judul_revisi'=> 'R1',
            'keterangan_revisi'=>'Perubahan Posisi Kabel'
        ]);
    }
}
