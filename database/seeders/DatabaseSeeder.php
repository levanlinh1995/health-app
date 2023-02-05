<?php

namespace Database\Seeders;

use App\Models\BodyRecord;
use App\Models\DiaryRecord;
use App\Models\ExerciseRecord;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Meal;
use App\Models\RecommendationCategory;
use App\Models\MealHistory;
use App\Models\MealTarget;
use App\Models\Recommendation;
use App\Models\Tag;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // create meals
        Meal::insert([
            [
                'name' => 'morning',
            ],
            [
                'name' => 'Lunch',
            ],
            [
                'name' => 'Dinner',
            ],
            [
                'name' => 'Snack',
            ]
        ]);

        // create recommendation categories
        RecommendationCategory::insert([
            [
                'name' => 'column'
            ],
            [
                'name' => 'diet'
            ],
            [
                'name' => 'beauty'
            ],
            [
                'name' => 'health'
            ]
        ]);

        // create tags
        Tag::insert([
            [
                'name' => 'DHA'
            ],
            [
                'name' => '魚料理'
            ],
            [
                'name' => '和食'
            ],
        ]);


        User::factory(5)->create()->each(function ($user) {
            MealHistory::factory(100)->create([
                'user_id' => $user->id,
                'meal_id' => Meal::all()->random()->id,
            ]);

            MealTarget::factory(100)->create([
                'user_id' => $user->id,
                'target' => Meal::count()
            ]);

            BodyRecord::factory(100)->create([
                'user_id' => $user->id,
            ]);

            ExerciseRecord::factory(100)->create([
                'user_id' => $user->id,
            ]);

            DiaryRecord::factory(100)->create([
                'user_id' => $user->id,
            ]);

            Recommendation::factory(100)->create([
                'recommendation_category_id' => RecommendationCategory::all()->random()->id,
            ])->each(function ($recommendation) {
                $recommendation->tags()->attach(Tag::all()->pluck('id')->toArray());
            });
        });
    }
}
