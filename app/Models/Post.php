<?php

namespace LaForum\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{

    use SoftDeletes; 
    use \Laravel\Scout\Searchable;

    protected $table = 'posts';

    protected $dates = ['deleted_at'];
    
    public function user()
    {
        return $this->belongsTo('LaForum\Models\User');
    }

    
    public function topic()
    {
        return $this->belongsTo('LaForum\Models\Topic');
    }
    
    public function children()
    {
        return $this->hasMany('LaForum\Models\Post');
    }
}
