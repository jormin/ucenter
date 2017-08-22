<?php

namespace App\Models;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{

    protected $fillable = ['name','display_name','description'];

    /**
     * 关联的用户
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'role_user');
    }

    /**
     * 权限ID
     *
     * @return string
     */
    public function permIds(){
        $idArr = $this->perms()->pluck('id')->toArray();
        return implode(',',$idArr);
    }
}
