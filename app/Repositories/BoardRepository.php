<?php

namespace LaForum\Repositories;

use LaForum\Models\Board;
use LaForum\Models\Post;
use LaForum\Models\Topic;

class BoardRepository extends Repository
{
    protected $topicRepository, $postRepository;

    public function __construct(Board $board, TopicRepository $topicRepository,
                                PostRepository $postRepository)
    {
        $this->model           = $board;
        $this->topicRepository = $topicRepository;
        $this->postRepository  = $postRepository;
    }

    public function addTopic($data)
    {
//        $post = new Post();
//        $post->text = $data['text'];
//        $post->topic_id = 0;
//        $post->save();
//
//        $topic = new Topic();
//
//        $topic->title = $data['title'];
//        $topic->board_id =$data['board_id'];
//        $topic->post_id = $post->id;
//
//        $topic->save();
//
//        $post->topic_id = $topic->id;
//        $post->save();
        return $this->topicRepository->createWithPost($data['board_id'],
            $data['title'], $data['text']);
    }
}