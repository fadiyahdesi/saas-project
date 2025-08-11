<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema; // <-- 1. Tambahkan ini

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 2. Nonaktifkan foreign key checks
        Schema::disableForeignKeyConstraints();

        // Hapus data lama (sekarang bisa)
        DB::table('sectors')->truncate();

        // 3. Aktifkan kembali foreign key checks
        Schema::enableForeignKeyConstraints();

        // 4. Masukkan data baru
        DB::table('sectors')->insert([
            ['name' => 'Pemerintahan'],
            ['name' => 'Kesehatan'],
            ['name' => 'Pendidikan'],
        ]);
    }
}