<?php

namespace LaForum\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use LaForum\Observers\NewPostObserver;

class Post extends Model
{

    use SoftDeletes;

    protected $table = 'posts';

    protected $dates = ['deleted_at'];
    
    public function user()
    {
        return $this->belongsTo('LaForum\Models\User');
    }

    
    public function topic()
    {
        return $this->hasOne('LaForum\Models\Topic');
    }
    
    public function children()
    {
        return $this->hasMany('LaForum\Models\Post');
    }
    
    public static function boot() {
        parent::boot();
        Post::observe(new NewPostObserver());
     
    }
    
    public function __toString() {
        return "";
    }
}
