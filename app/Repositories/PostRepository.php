<?php
namespace LaForum\Repositories;
use LaForum\Models\Post;

class PostRepository extends Repository
{

    public function __construct(Post $model)
    {
        $this->model = $model;
    }

    public function create($text, $user_id, $topic_id=0, $parent_id=null) {
        $post = new Post();
        $post->topic_id = $topic_id;
        $post->parent_id = $parent_id;
        $post->text = $text;
        $post->user_id = $user_id; //temporary
        $post->save();
        return $post;

    }
}
