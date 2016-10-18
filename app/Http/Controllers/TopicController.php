<?php

namespace LaForum\Http\Controllers;

use LaForum\Repositories\PostRepository;
use LaForum\Repositories\TopicRepository;
use LaForum\Models\Topic;

class TopicController extends Controller
{
    protected $postRepository;
    protected $topicRepository;

    public function __construct(PostRepository $postRepository,
                                TopicRepository $topicRepository)
    {
        $this->postRepository  = $postRepository;
        $this->topicRepository = $topicRepository;
    }

    public function topic($id)
    {

        $topic = $this->topicRepository->findWithPosts($id);

//        var_dump($topic->posts);
//        die;

        return View('boards.topic', [
            'topic' => $topic,
        ]);
    }

    
}