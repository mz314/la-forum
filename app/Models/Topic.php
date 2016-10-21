<?php

namespace LaForum\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];
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
