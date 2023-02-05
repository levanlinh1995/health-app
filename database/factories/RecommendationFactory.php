<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Recommendation;
use App\Models\RecommendationCategory;

class RecommendationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Recommendation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'recommendation_category_id' => RecommendationCategory::factory(),
            'title' => $this->faker->sentence(4),
            'featured_img_path' => $this->faker->imageUrl(),
            'content' => $this->faker->paragraphs(3, true),
            'status' => 1,
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime(),
        ];
    }
}
