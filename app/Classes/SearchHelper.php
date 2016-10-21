<?php
namespace LaForum\Classes;

use LaForum\Repositories\TopicRepository;
use LaForum\Repositories\PostRepository;

class SearchHelper 
{
    protected $topicRepository;
    protected $postRepository;
    
    public function __construct(TopicRepository $topicRepository, PostRepository $postRepository)
    {
        $this->topicRepository = $topicRepository;
        $this->postRepository = $postRepository;
    }
}