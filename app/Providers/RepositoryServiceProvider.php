<?php

namespace App\Providers;

use App\Contracts\MealHistoryRepository;
use App\Contracts\MealRepository;
use App\Contracts\MealTargetRepository;
use App\Contracts\BodyRecordRepository;
use App\Contracts\ExerciseRecordRepository;
use App\Contracts\DiaryRecordRepository;
use App\Contracts\RecommendationCategoryRepository;
use App\Contracts\RecommendationRepository;
use App\Contracts\TagRepository;
use App\Repositories\EloquentMealHistoryRepository;
use App\Repositories\EloquentMealRepository;
use App\Repositories\EloquentMealTargetRepository;
use App\Repositories\EloquentBodyRecordRepository;
use App\Repositories\EloquentExerciseRecordRepository;
use App\Repositories\EloquentDiaryRecordRepository;
use App\Repositories\EloquentRecommendationCategoryRepository;
use App\Repositories\EloquentRecommendationRepository;
use App\Repositories\EloquentTagRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(MealHistoryRepository::class, EloquentMealHistoryRepository::class);
        $this->app->singleton(MealRepository::class, EloquentMealRepository::class);
        $this->app->singleton(MealTargetRepository::class, EloquentMealTargetRepository::class);
        $this->app->singleton(BodyRecordRepository::class, EloquentBodyRecordRepository::class);
        $this->app->singleton(ExerciseRecordRepository::class, EloquentExerciseRecordRepository::class);
        $this->app->singleton(DiaryRecordRepository::class, EloquentDiaryRecordRepository::class);
        $this->app->singleton(RecommendationCategoryRepository::class, EloquentRecommendationCategoryRepository::class);
        $this->app->singleton(RecommendationRepository::class, EloquentRecommendationRepository::class);
        $this->app->singleton(TagRepository::class, EloquentTagRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
