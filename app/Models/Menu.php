<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\MenuTrait;
use Illuminate\Support\Facades\Auth;

class Menu extends Model
{
    use MenuTrait;

    protected $fillable = ['name','icon','route','pid'];

    /**
     * 父菜单
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent(){
        return $this->belongsTo('App\Models\Menu','pid');
    }

    /**
     * 子菜单
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children(){
        return $this->hasMany('App\Models\Menu','pid','id');
    }

    /**
     * 关联的权限
     *
     * @return null
     */
    public function permission(){
        if($this->permission_id){
            return Permission::find($this->permission_id);
        }else{
            return null;
        }
    }

    /**
     * 菜单真实路由
     *
     * @return string
     */
    public function route(){
        if(!$this->route){
            return null;
        }
        if(strpos($this->route,',') === false){
            return route($this->route);
        }else{
            $arr = explode(',',$this->route);
            return route($arr[0],$arr[1]);
        }
    }

    /**
     * 检测当前用户是否拥有此菜单权限
     *
     * @return bool
     */
    public function hasPermission(){
        if(!$this->permission_id || Auth::user()->can($this->permission()->name)){
            return true;
        }
        return false;
    }

    /**
     * 是否显示父级菜单
     *
     * @return bool
     */
    public function isParentMenuShow(){
        if($this->route){
            return true;
        }
        if(count($children = $this->children) === 0){
            return false;
        }
        foreach ($children as $child){
            if($child->hasPermission()){
                return true;
            }
        }
        return false;
    }

}
