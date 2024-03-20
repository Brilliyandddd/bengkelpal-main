<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('project_menus')->insert([
            'nama_project'=> 'Kalibrasi alat ukur',
            'start_project' => '2024-01-02',
            'finish_project'=> '2024-01-03',
            'keterangan_project'=> 'Pekerjaan kalibrasi alat ukur',
        ]);
    }
}
