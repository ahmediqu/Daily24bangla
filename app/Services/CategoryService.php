<?php


namespace App\Services;


use App\Models\Category;

class CategoryService
{
    public function __construct(Category $category)
    {
        $this->category = $category;
    }



}
