<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = ['name', 'slug', 'position', 'order_by_position', 'status'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($category) {
            $category->slug = $category->make_slug($category->name).'-'.$category->unique_code(9);
        });
    }

    function unique_code($limit)
    {
        return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
    }


    function make_slug($string) {
        return preg_replace('/\s+/u', '-', trim($string));
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }


}
