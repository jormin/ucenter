<?php

namespace App\Providers;

use App\Models\Menu;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Form;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // 设定Carbon时区
        Carbon::setLocale('zh');

        // 后台左侧菜单
        if(isset($_SERVER['HTTP_HOST'])){
            $menus = Menu::whereNull('pid')->get();
            View::share('navbarMenus', $menus);
        }

        // 组件
        Form::component('bstext', 'components.form.bstext', ['name', 'label' => null, 'value'=>null, 'attributes'=>[]]);
        Form::component('bspassword', 'components.form.bspassword', ['name', 'label' => null, 'value'=>null, 'attributes'=>[]]);
        Form::component('bstextarea', 'components.form.bstextarea', ['name', 'label' => null, 'value'=>null, 'attributes'=>[]]);
        Form::component('bselect', 'components.form.bselect', ['name', 'label' => null, 'options' => [], 'value'=>null, 'attributes'=>[]]);
        Form::component('bsdate', 'components.form.bsdate', ['name', 'label' => null, 'value'=>null, 'attributes'=>[], 'format' => 'yyyy-mm-dd', 'startView'=>'month', 'minView'=>2, 'readonly'=>true]);

        // 验证扩展
        Validator::extend('zh_mobile', function ($attribute, $value) {
            return preg_match('/^(\+?0?86\-?)?((13\d|14[57]|15[^4,\D]|17[3678]|18\d)\d{8}|170[059]\d{7})$/', $value);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
