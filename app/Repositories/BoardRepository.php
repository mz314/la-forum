<?php

namespace LaForum\Repositories;

use LaForum\Models\Board;
use LaForum\Models\Post;
use LaForum\Models\Topic;

class BoardRepository extends Repository
{

    protected $topicRepository, $postRepository;

    public function __construct(Board $board, TopicRepository $topicRepository, PostRepository $postRepository)
    {
        $this->model = $board;
        $this->topicRepository = $topicRepository;
        $this->postRepository = $postRepository;
    }

    public function addTopic($data)
    {

        return $this->topicRepository->createWithPost($data['board_id'], $data['user_id'], $data['title'], $data['text']);
    }

    public function create($data)
    {
        $board = new Board();
        $board->title = $data['title'];
        $board->description = $data['description'];
        
        $board->save();

        return $board;
    }
    
    public function update(Board $board, $data) 
    {
        $board->title = $data['title'];
        $board->description = $data['description'];
        
        $board->update();
    }
}
