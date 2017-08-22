<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;

    use EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'avatar', 'name', 'mobile', 'sex', 'is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * 用户头像
     *
     * @param $avatar
     * @return string
     */
    public function getAvatarAttribute($avatar){
        return $avatar ? config('filesystems.disks.qiniu.domain').'/'.$avatar : '/img/avatar.jpg';
    }

    /**
     * 用户角色ID
     *
     * @return string
     */
    public function roleIds(){
        $idArr = $this->roles()->pluck('id')->toArray();
        return implode(',',$idArr);
    }
}
