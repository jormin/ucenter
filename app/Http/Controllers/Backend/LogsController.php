<?php

namespace App\Http\Controllers\Backend;

use App\Models\Export;
use App\Models\SigninLog;
use App\Models\User;
use App\Repositories\UsersRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Activitylog\Models\Activity;

class LogsController extends Controller
{

    protected $userRepo;

    public function __construct(UsersRepository $userRepo)
    {
        $this->userRepo = $userRepo;
        $this->middleware('permission:logs-index',['only'=>'index']);
        $this->middleware('permission:logs-export',['only'=>'export']);
    }


    /**
     * 处理日志列表
     *
     * @param
     * @return array
     */
    protected function logList(){
        $query = Activity::query()->orderBy('created_at','desc');
        $subjectOptions = [
            '0'=>'类型',
            'Member'=>'客户',
            'Order'=>'订单',
            'Export'=>'导出',
            'Combination'=>'合版',
            'User'=>'账号',
            'Role'=>'角色',
            'Config'=>'配置',
        ];
        if(Auth::user()->hasRole('admin')){
            $subjectOptions += [
                'Menu'=>'菜单',
                'Permission'=>'权限'
            ];
        }
        $subject_type = request()->subject_type;
        if($subject_type){
            $query = $query->where('subject_type','App\Models\\'.$subject_type);
        }

        $data = [
            'subjectOptions' => $subjectOptions,
            'subject_type' => $subject_type
        ];

        if(Route::currentRouteName() === 'logs.index'){
            $userQuery = User::query();
            if(!Auth::user()->hasRole('admin')){
                $query = $query->where('causer_id','<>',1)->where('subject_type','<>','App\Models\Menu')->where('subject_type','<>','App\Models\Permission');
                $userQuery = $userQuery->where('id','<>',1);
            }
            $userOptions = $userQuery->pluck('name','id')->toArray();
            $userOptions = ['账号']+$userOptions;
            $user_id = request()->user_id;
            if($user_id){
                $query = $query->where('causer_id',$user_id);
            }
            $data['userOptions'] = $userOptions;
            $data['user_id'] = $user_id;
        }else{
            $query = $query->where('causer_id',Auth::user()->id);
        }

        $logs = $query->paginate(30);
        $data['logs'] = $logs;
        return $data;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = $this->logList();
        return view('backend.logs.index',$data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function mine()
    {
        $data = $this->logList();
        return view('backend.logs.index',$data);
    }

    /**
     * 登录日志
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function signin(){
        $logs = SigninLog::query()->where('user_id',Auth::id())->orderBy('login_time','desc')->paginate(30);
        return view('backend.logs.signin',compact('logs'));
    }

    /**
     * 文件导出
     */
    public function export(){
        $logs = Export::query()->orderBy('created_at','desc')->paginate(30);
        return view('backend.logs.export',compact('logs'));
    }
}
