<?php

namespace LaForum\Classes;

use LaForum\Repositories\TopicRepository;
use LaForum\Repositories\PostRepository;
use LaForum\Repositories\UserRepository;

class SearchHelper
{
    protected $topicRepository, $postRepository, $userRepository;

    public function __construct(TopicRepository $topicRepository,
                                PostRepository $postRepository,
                                UserRepository $userRepository)
    {
        $this->topicRepository = $topicRepository;
        $this->postRepository  = $postRepository;
        $this->userRepository  = $userRepository;
    }

    

    public function searchPhrase($phrase)
    {
       return $this->postRepository->searchPhrase($phrase, false);
    }
}