<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SiswaSeeder extends Seeder
{
    
    public function run()
    {
        $faker = Faker::create('id_ID');

        for($x = 1; $x <= 50; $x++)
        {
            DB::table('students')->insert([
                'nama_depan'      => $faker->name,
                'nama_belakang'   => Str::random(10),
                'jenis_kelamin'   => Str::random(1),
                'agama'          => Str::random(10),
                'alamat'          => $faker->address,
            ]);
        }
    }
}
