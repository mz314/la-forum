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

    public function create($data, $user_id)
    {
        $topic           = new Topic();
        $topic->board_id = $data['board_id'];
        $topic->title    = $data['title'];
        $topic->text     = $data['text'];
        $topic->user_id  = $user_id;
        $topic->save();

        return $topic;
    }

    public function get($topic_id)
    {
        return Topic::find($topic_id);
    }

    public function findWithPosts($topic_id)
    {
        $topic = Topic::find($topic_id);

        $topic->replies = $topic->posts()->where('id', '!=', $topic->post->id)->get();

        return $topic;
    }
}