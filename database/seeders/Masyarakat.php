<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class Masyarakat extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $data = [];

        for($i = 0; $i < 500; $i++) {
            $data[] = [
                'nomor_kk'      => $faker->numerify('3###############'),
                'nomor_ktp'     => $faker->unique(), 
                'nama'          => $faker->name(),
                'alamat'        => $faker->address(),
                'jenis_kelamin' => $faker->randomElement(['Laki-Laki', 'Perempuan']),
                'created_at'    => now(),
                'updated_at'    => now(),
            ];

            if (count($data) >= 100) {
                DB::table('masyarakats')->insert($data);
                $data = [];
            }
        }

        if (!empty($data)) {
            DB::table('masyarakats')->insert($data);
        }
    }
}