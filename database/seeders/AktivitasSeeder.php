<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AktivitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('aktivitas')->insert([
            'id_project' => '1',
            'nama_aktivitas' => 'BRS 1 ',
            'status_aktivitas' => 'On Track',
            'start_aktivitas' => '2024-01-02',
            'finish_aktivitas' => '2024-01-02',
            'keterangan_aktivitas'=> 'Pekerjaan pemasangan electrical engine',
        ]);
    }
}
