<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ExerciseRecord;
use App\Models\User;

class ExerciseRecordFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ExerciseRecord::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->text,
            'date' => $this->faker->date(),
            'time' => $this->faker->dateTime()->format('H:i'),
            'kcal' => $this->faker->randomFloat(0, 0, 55),
            'duration' => $this->faker->numberBetween(10, 60),
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime(),
        ];
    }
}
