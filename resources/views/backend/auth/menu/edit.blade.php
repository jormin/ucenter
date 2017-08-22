@extends('layouts.backend')

@section('content')
    <div class="col-md-12 col-sm-12">
        <div class="block-flat">
            <div class="header">
                <h4>
                    编辑菜单
                    <span class="pull-right">
                    <a href="{{ route('menus.index') }}">
                        <i class="fa fa-list"></i>
                    </a>
                    </span>
                </h4>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12 div-sm-12">
                        {{ Form::model($menu,['route'=>['menus.update',$menu->id],'method'=>'put','class'=>'form-horizontal']) }}

                            {!! Form::bselect('pid','父级',$pmenuOptions,$menu->pid) !!}

                            {!! Form::bstext('name','名称') !!}

                            <div class="form-group icon-wrap" @if($menu->pid) style="display: none" @endif>
                                {!! Form::label('icon','图标',['class'=>'col-sm-3 control-label']) !!}
                                <div class="col-sm-6">
                                    <div class="input-group iconpicker-container">
                                        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-bars"></i></span>
                                        {!! Form::text('icon',null,['class'=>'form-control icp icp-auto iconpicker-element iconpicker-input','data-placement'=>"bottomLeft"]) !!}
                                    </div>
                                    <span class="help-block">
                                        <i class="fa fa-info-circle"></i>&nbsp;更多图标请访问 <a href="http://fontawesome.dashgame.com" target="_blank">http://fontawesome.dashgame.com</a>
                                    </span>
                                </div>
                            </div>

                            {!! Form::bstext('route','路由') !!}

                            {!! Form::bselect('permission_id','权限',$permissionOptions,null,['class'=>'select2']) !!}

                            <div class="form-group">
                                <div class="col-sm-10 col-sm-offset-2">
                                    {!! Form::button('重置',['class'=>'btn btn-info','type'=>'reset']) !!}
                                    {!! Form::submit('保存',['class'=>'btn btn-success']) !!}
                                </div>
                            </div>
                        {{ Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('backend.auth.menu._common')