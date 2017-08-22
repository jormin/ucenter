<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CreateConfigRequest;
use App\Models\Config;
use App\Repositories\ConfigsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ConfigsController extends Controller
{

    protected $configRepo;

    public function __construct(ConfigsRepository $configRepo)
    {
        $this->configRepo = $configRepo;
        $this->middleware('permission:configs-index',['only'=>'index']);
        $this->middleware('permission:configs-create',['only'=>['create','store']]);
        $this->middleware('permission:configs-destroy',['only'=>'destroy']);
        $this->middleware('permission:configs-default',['only'=>'default']);
    }

    /**
     * 配置列表
     *
     * @param string $type
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($type = 'size')
    {
        $configs = Config::where('type',strtoupper($type))->orderBy(DB::raw('abs(value)'))->get();
        return view('backend.config.index',compact('configs','type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存配置
     *
     * @param CreateConfigRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateConfigRequest $request)
    {
        $this->configRepo->createConfig($request);
        return redirect()->back()->with('success','添加配置项成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->configRepo->deleteConfig($id);
        return redirect()->back()->with('success','删除配置项成功');
    }

    /**
     * 设为默认
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function default($id)
    {
        $this->configRepo->defaultConfig($id);
        return redirect()->back()->with('success','设为默认成功');
    }
}
