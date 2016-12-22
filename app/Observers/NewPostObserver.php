<?php

namespace LaForum\Observers;

use Mail;
use LaForum\Models\Post;
use LaForum\Mail\TopicReplied;

class NewPostObserver
{

    public function created(Post $post)
    {

        if ($post->topic) {
            $topicReplied = new TopicReplied($post);

            $topic = $post->topic;

            Mail::to($topic->user->email)
                ->send($topicReplied);
            // https://laravel.com/docs/5.1/mail + queue
        }
    }
}
