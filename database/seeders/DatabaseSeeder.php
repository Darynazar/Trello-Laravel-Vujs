<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Board;
use App\Models\BoardList;
use App\Models\Card;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $user = \App\Models\User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('secret')
        ]);

        $boards = Board::factory(10)->for($user)->create();

        foreach($boards as $board) {
            $boardLists = BoardList::factory(5)->create([
                'board_id' => $board->id,
                'user_id' => $user->id
            ]);

            foreach($boardLists as $boardList)
            Card::factory(10)->create([
                'board_id' => $board->id,
                'user_id' => $user->id,
                'board_list_id' => $boardList->id
            ]);
        }


    }
}
