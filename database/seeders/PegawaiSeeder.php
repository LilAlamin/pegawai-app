<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID'); // Menggunakan lokal Indonesia

        for ($i = 0; $i < 10; $i++) {
            FacadesDB::table('pegawai')->insert([
                'nik' => $faker->numberBetween(10000, 99999),
                'nama_pegawai' => $faker->name,
                'provinsi' => $faker->state,
                'alamat' => $faker->streetAddress . ', ' .'Kode Pos '. $faker->postcode,
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'created_at' => now(),
                // Tambahkan field lainnya sesuai kebutuhan
            ]);
        }
    }
}
