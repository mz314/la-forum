<?php

namespace LaForum\Models;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    protected $table = 'users';

    use Notifiable,
        EntrustUserTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getRolesListAttribute()
    {
        return $this->roles()->lists('id');
    }

    public function getAvatar()
    {
        return URL::asset('images/avatars/'.$this->avatar);
    }
}