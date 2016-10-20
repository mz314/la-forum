<?php

namespace LaForum\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table = 'topics';

    public function board()
    {
        return $this->belongsTo('LaForum\Models\Board');
    }

    public function user()
    {
        return $this->belongsTo('LaForum\Models\User');
    }

    public function posts()
    {
        return $this->hasMany('LaForum\Models\Post', 'topic_id', 'id');
    }
}