<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Aktivitas;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ProjectMenuSeeder::class,
            MenuLanjutanSeeder::class,
            NotifikasiSeeder::class,
            AktivitasSeeder::class,
            ToolSeeder::class,
            RevisiGambarSeeder::class,
            UserSeeder::class,
            DivisiSeeder::class,
        ]);
    }
}
