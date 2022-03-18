<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PlayingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('playings')->insert([
            [
                'player_id' => '1',
                'start_time' => '2020-09-01',
                'score' => '10',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'player_id' => '2',
                'start_time' => '2020-09-01',
                'score' => '15',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'player_id' => '3',
                'start_time' => '2020-09-01',
                'score' => '20',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'player_id' => '1',
                'start_time' => '2020-09-02',
                'score' => '8',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'player_id' => '2',
                'start_time' => '2020-09-02',
                'score' => '15',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'player_id' => '3',
                'start_time' => '2020-09-02',
                'score' => '10',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
        ]);
    }
}
