<?php

namespace Database\Factories;

use App\Models\Election;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Election>
 */
class ElectionFactory extends Factory
{
    protected $model = Election::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3), // Random election name
            'description' => $this->faker->paragraph, // Random description
            'start_datetime' => $this->faker->dateTimeBetween('now', '+1 month'), // Future date
            'end_datetime' => $this->faker->dateTimeBetween('+1 month', '+2 months'), // Future end date
            'status' => $this->faker->randomElement(['upcoming', 'active', 'completed']), // Random status
        ];
    }

    public function withBallotsAndCandidates($ballotsCount = 3, $candidatesCount = 5)
    {
        return $this->has(
            \App\Models\Ballot::factory()
                ->count($ballotsCount)
                ->hasCandidates($candidatesCount),
            'ballots'
        );
    }
}
