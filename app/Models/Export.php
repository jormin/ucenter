<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Export extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'type', 'filename'
    ];

    /**
     * 导出账号
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    /**
     * 文件链接
     *
     * @return string
     */
    public function filelink(){
        return config('filesystems.disks.qiniu.domain').'/exports/'.$this->filename;
    }
}
