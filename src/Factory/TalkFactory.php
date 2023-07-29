<?php

namespace App\Factory;

use Faker\Factory as FakerFactory;
use WouterJ\EloquentBundle\Factory\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Model\Talk>
 */
class TalkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = FakerFactory::create();

        return [
            'title' => trim($faker->sentence(3), '.'),
            'author' => $faker->name(),
            'accepted' => false,
            'abstract' => $faker->paragraph(),
            'proposal_notes' => $faker->randomDigit() > 5 ? $faker->paragraph() : '',
        ];
    }

    public function accepted(): Factory
    {
        return $this->state(fn (array $attributes): array => ['accepted' => true]);
    }
}
