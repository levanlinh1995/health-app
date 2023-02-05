<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'recommendation_category_id',
        'title',
        'featured_img_path',
        'content',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'integer',
    ];

    public function recommendationCategory()
    {
        return $this->belongsTo(RecommendationCategory::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_recommendations', 'recommendation_id', 'tag_id');
    }

}
