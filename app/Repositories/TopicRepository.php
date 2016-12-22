<?php

namespace LaForum\Repositories;

use Illuminate\Support\Facades\DB;
use LaForum\Models\Topic;
use LaForum\Models\Post;

class TopicRepository extends SearchableRepository
{

    protected $postRepository;

    public function __construct(Topic $model, PostRepository $postRepository)
    {
        $this->model = $model;
        $this->postRepository = $postRepository;
    }

    protected function getSearchableFields()
    {
        return [
            'title',
           /// 'text',
        ];
    }

    public function create($data, $user_id)
    {

        DB::beginTransaction();


        $post = new Post();
        $post->text = $data['text'];
        $post->user_id = $user_id;



        $post->topic_id = null;
        $post->save();


        $topic = new Topic();
        $topic->board_id = $data['board_id'];
        $topic->title = $data['title'];
        $topic->post_id = $post->id;
        $topic->save();



        DB::commit();

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
