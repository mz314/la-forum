<?php

namespace LaForum\Classes\Search;

use LaForum\Repositories\TopicRepository;
use LaForum\Repositories\PostRepository;
use LaForum\Repositories\UserRepository;

class SearchHelper
{

    protected $topicRepository, $postRepository, $userRepository;

    public function __construct(TopicRepository $topicRepository, PostRepository $postRepository, UserRepository $userRepository)
    {
        $this->topicRepository = $topicRepository;
        $this->postRepository = $postRepository;
        $this->userRepository = $userRepository;
    }

    protected function transform($type, $res)
    {
        $results = [];

        switch ($type) {
            case 'post':
                $textCol = 'text';
                $titleCol = null;
                break;

            case 'topic':
                $titleCol = 'title';
                $textCol = null;
                break;
            case 'user':
                $titleCol = 'name';
                $textCol = '';
                break;

            default:
                $titleCol = null;
                $textCol = null;
                break;
        }

        foreach ($res as $item) {
            $title = null;
            $text = null;
            if ($titleCol) {
                $title = $item->{$titleCol};
            }

            if ($textCol) {
                $text = $item->{$textCol};
            }
            $entry = new SearchResultEntry($type, $title, $text);
            $results[] = $entry;
        }

        return $results;
    }

    protected function mergeAndTransform($searchRes)
    {
        $results = [];

        foreach ($searchRes as $type => $res) {
            $transformed = $this->transform($type, $res);
            $results = array_merge($results, $transformed);
        }

        return $results;
    }

    public function searchPhrase($phrase)
    {
        $searchRepos = [
            'post' => $this->postRepository,
            'topic' => $this->topicRepository,
            'user' => $this->userRepository,
        ];

        $searchRes = [];

        foreach ($searchRepos as $type => $sR) {
            $searchRes[$type] = $sR->getModel()->search($phrase)->get();
        }


        
       // $results = $this->mergeAndTransform($searchRes);
//        dd($results);
        return $searchRes;

    }
}
