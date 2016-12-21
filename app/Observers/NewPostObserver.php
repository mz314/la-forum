<?php

namespace LaForum\Observers;

use Mail;
use LaForum\Models\Post;



class NewPostObserver
{

    public function created(Post $model)
    {
    // https://laravel.com/docs/5.1/mail + queue
    }
}
