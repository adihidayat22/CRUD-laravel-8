<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PlayerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Insert Data Player
        \DB::table('players')->insert([
            [
                'nama' => "Doni",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'nama' => "Budi",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'nama' => "Koko",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
        ]);
    }
}
