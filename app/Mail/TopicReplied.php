<?php

namespace LaForum\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use LaForum\Models\Post;

class TopicReplied extends Mailable
{
    use Queueable, SerializesModels;


    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.topic_replied');
    }
}
