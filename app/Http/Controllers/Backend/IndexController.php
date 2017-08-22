<?php

namespace App\Http\Controllers\Backend;

use App\Models\Member;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Models\Activity;

class IndexController extends Controller
{
    /**
     * 首页
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $logs = Activity::where('causer_id', Auth::user()->id)->orderBy('created_at','desc')->paginate(10);
        $count = collect();
    	return view('backend.index',compact('logs','count'));
    }
}
