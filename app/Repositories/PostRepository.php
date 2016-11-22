<?php

namespace LaForum\Repositories;

use LaForum\Models\Post;
use LaForum\Models\Topic;

class PostRepository extends SearchableRepository
{

    public function __construct(Post $model)
    {
        $this->model = $model;
    }

    public function getSearchableFields()
    {
        return [
          'text',
        ];
    }

    public function create($text, $user_id, $topic_id = 0, $parent_id = null)
    {
        $post = new Post();

        $post->topic_id  = $topic_id;
        $post->parent_id = $parent_id;
        $post->text      = $text;
        $post->user_id   = $user_id;

        $post->save();

        return $post;
    }

    public function createReply($topic_id, $parent_id, $text, $user_id)
    {
        $parentPost = Post::find($parent_id);

        $post            = new Post();
        $post->parent_id = ($parent_id == '' ? null : $parent_id);
        $post->text      = $text;
        $post->topic_id  = $topic_id;
        $post->user_id   = $user_id;

        $post->save();

        return $post;
    }

    public function getByParent($parent_id)
    {
        return Post::where('parent_id', $parent_id)->get();
    }

    public function getByTopicTree($topic_id, $paging = null)
    {

        $postsQuery = Post::where('topic_id', $topic_id)
               ->with('user')->get(); 

        $posts = [];

        $postsQuery->map(function ($item) use(&$posts) {

            if (!isset($posts[$item->parent_id])) {
                $posts[$item->parent_id] = [];
            }

            $posts[$item->parent_id][] = $item;
        });

        $data        = new \stdClass();
        $data->tree  = $posts;
        $data->posts = $postsQuery;

        return $data;
    }
    
}