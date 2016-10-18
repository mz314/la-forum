<?php

namespace LaForum\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table = 'topics';

    public function board()
    {
        return $this->belongsTo('LaForum\Models\Board', 'foreign_key');
    }

    public function post()
    {
        return $this->hasOne('LaForum\Models\Post');
    }

    public function posts()
    {
        return $this->hasMany('LaForum\Models\Post', 'topic_id', 'id');
    }
}