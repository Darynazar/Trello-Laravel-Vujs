<?php

namespace Database\Factories;

use App\Models\Board;
use App\Models\BoardList;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => Board::factory(),
            'board_id' => BoardList::factory(),
            'board_list_id' => User::factory(),
            'title' => $this->faker->sentence(),
            'description' => $this->faker->sentences(3, true)
        ];
    }
}
