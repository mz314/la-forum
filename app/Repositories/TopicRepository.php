<?php

namespace LaForum\Repositories;

use LaForum\Models\Topic;

class TopicRepository extends Repository
{
    protected $postRepository;

    public function __construct(Topic $model, PostRepository $postRepository)
    {
        $this->model          = $model;
        $this->postRepository = $postRepository;
    }

    public function create($board_id, $post_id, $title)
    {
        $topic           = new Topic();
        $topic->board_id = $board_id;
        $topic->title    = $title;
        $topic->post_id  = $post_id;
        $topic->save();

        return $topic;
    }

    public function createWithPost($board_id, $user_id, $title, $text)
    {
        $post = $this->postRepository->create($text, $user_id);

        $topic          = $this->create($board_id, $post->id, $title);
        $post->topic_id = $topic->id;
        $post->save();
    }

    public function get($topic_id)
    {
        return Topic::find($topic_id)->first();
    }

    public function findWithPosts($topic_id)
    {
        $topic = Topic::find($topic_id);

        $topic->replies = $topic->posts()->where('id', '!=', $topic->post->id)->get();

        return $topic;
    }
}