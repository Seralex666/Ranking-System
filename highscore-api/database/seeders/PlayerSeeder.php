<?php

namespace Database\Seeders;

use App\Models\Player;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = \file_get_contents(\database_path('seeders/players.json'));
        $players = json_decode($json, true);

        foreach ($players as $player) {
            Player::create([
                'nickname' => $player['nickname'],
                'city' => $player['city'],
                'score' => $player['score'],
                'coaturl' => $player['coaturl'],
            ]);
        }
    }
}
