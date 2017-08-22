<?php

namespace App\Repositories;


use App\Models\Config;
use Illuminate\Support\Facades\DB;

class ConfigsRepository
{

    /**
     * 添加配置
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function createConfig($request)
    {
        $config = Config::create([
            'type' => strtoupper($request->type),
            'value' => $request->value
        ]);

        activity()->on($config)->log('创建配置['.strtoupper($request->type).':'.$request->value.']成功');
    }

    /**
     * 删除配置
     *
     * @param  $id
     */
    public function deleteConfig($id)
    {
        $config = Config::findOrFail($id);
        $config->delete();
        activity()->on($config)->log('删除配置['.strtoupper($config->type).':'.$config->value.']成功');
    }

    /**
     * 设置默认配置
     *
     * @param $id
     */
    public function defaultConfig($id){
        $config = Config::findOrFail($id);
        Config::where('type',$config->type)->update(['default'=>0]);
        $config->default = 1;
        $config->save();
        activity()->on($config)->log('设置配置['.strtoupper($config->type).':'.$config->value.']为默认项成功');
    }

    /**
     * 读取选项数组
     *
     * @param $type
     * @return mixed
     */
    public function options($type){
        return Config::where('type',$type)->orderBy(DB::raw('abs(value)'))->pluck('value')->toArray();
    }

    /**
     * 默认配置项
     *
     * @param $type
     * @return mixed
     */
    public function defaultOption($type){
        return Config::where('type',$type)->where('default',1)->pluck('value')->first();
    }

}
