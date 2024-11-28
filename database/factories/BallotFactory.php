<?php

namespace Database\Factories;

use App\Models\Election;
use App\Models\Ballot;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ballot>
 */
class BallotFactory extends Factory
{
    protected $model = Ballot::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'election_id' => Election::factory(), // Automatically creates an associated Election
            'ballot_name' => $this->faker->word(),
            'ballot_description' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(['active', 'inactive']), // Random status
        ];
    }

    public function hasCandidates($count = 5)
    {
        return $this->has(
            \App\Models\Candidate::factory()->count($count),
            'candidates'
        );
    }
}
