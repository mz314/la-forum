<?php

namespace LaForum\Repositories;

use LaForum\Models\Post;
use LaForum\Models\Topic;

class PostRepository extends Repository
{

    public function __construct(Post $model)
    {
        $this->model = $model;
    }

    public function create($text, $user_id, $topic_id = 0, $parent_id = null)
    {
        $post = new Post();

        $post->topic_id  = $topic_id;
        $post->parent_id = $parent_id;
        $post->text      = $text;
        $post->user_id   = $user_id; //temporary

        $post->save();

        return $post;
    }

    public function createReply($parent_id, $text, $user_id)
    {
        $parentPost = Post::find($parent_id);

        $post            = new Post();
        $post->parent_id = $parent_id;
        $post->text      = $text;
        $post->topic_id  = $parentPost->topic_id;
        $post->user_id   = $user_id;

        $post->save();

        return $post;
    }

    public function getByParent($parent_id)
    {
        return Post::where('parent_id', $parent_id)->get();
    }

    public function getByTopicTree($topic_id)
    {
        $topic = Topic::find($topic_id)->first();

        $postsQuery = Post::where('topic_id', $topic_id)
            ->where('parent_id', '!=', null);

        $posts = [];

        $postsQuery->get()->map(function ($item) use(&$posts) {

            if (!isset($posts[$item->parent_id])) {
                $posts[$item->parent_id] = [];
            }

            $posts[$item->parent_id][] = $item;
        });


        return $posts;
    }
}