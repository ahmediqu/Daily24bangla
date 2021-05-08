<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'posts';

    protected $fillable = ['title', 'slug', 'image', 'sort_description', 'description', 'author_id', 'category_id', 'status'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['title', 'id']
            ]
        ];
    }

    public function category() {
        return $this->belongsTo( Category::class, 'category_id');
    }

}
