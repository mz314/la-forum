<?php

namespace LaForum\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use LaForum\Repositories\PostRepository;
use LaForum\Repositories\TopicRepository;
use LaForum\Http\Requests\PostRequest;
use LaForum\Http\Requests\TopicRequest;
use Illuminate\Http\Request;
use LaForum\Models\Topic;
use LaForum\Models\Post;

class TopicController extends Controller
{

    protected $postRepository;
    protected $topicRepository;

    public function __construct(PostRepository $postRepository, TopicRepository $topicRepository)
    {
        $this->postRepository = $postRepository;
        $this->topicRepository = $topicRepository;
    }

    public function topic($id)
    {

        $topic = $this->topicRepository->get($id);

        $treeData = $this->postRepository->getByTopicTree($id);

        return View('boards.topic', [
            'topic' => $topic,
            'replies' => $treeData->tree,
            'posts' => $treeData->posts,
        ]);
    }

    public function reply(PostRequest $request)
    {
        $this->postRepository->createReply(
            $request->get('topic_id'), $request->get('parent_id'), $request->get('text'), Auth::user()->id
        );

        return redirect()->route('topic', [$request->get('topic_id')]);
    }

    public function deletePost(Request $request, Post $item)
    {

        if ($item->topic_id) {
            $route = redirect()->route('topic', $item->topic_id);
        } else {
            $route = redirect()->route('board', $item->topic->board_id);
            $item = $item->topic();
        }

        if ($request->get('hard', '0') == 1) {
            $item->forceDelete();
        } else {
            $item->delete();
        }


        return $route;
    }

    public function create(TopicRequest $request)
    {

        $this->topicRepository->create($request->all(), Auth::user()->id);

        return redirect()->route('board', [$request->get('board_id')]);
    }
}
