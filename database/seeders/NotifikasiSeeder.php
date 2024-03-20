<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotifikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('notifikasis')->insert([
            'status' => 'Baik',
            'keterangan'=>'Percepatan pengerjaan pemasangan pipa',
        ]);
    }
}
