<?php


namespace App\Services;


use App\Models\Post;

class PostService
{
    public function __construct(Post $post)
    {
        $this->post = $post;
    }
}
