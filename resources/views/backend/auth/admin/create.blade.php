@extends('layouts.backend')

@section('content')
    <div class="col-md-12">
        <div class="block-flat">
            <div class="header">
                <h3>
                    创建工作人员账号
                    <span class="pull-right">
                        <a href="{{ route('admins.index') }}">
                            <i class="fa fa-list"></i>
                        </a>
                    </span>
                </h3>
            </div>
            <div class="content">
                {!! Form::open(['route'=>'admins.store','method'=>'post','files'=>true,'class'=>'form-horizontal group-border-dashed']) !!}

                    <div class="form-group">
                        {!! Form::label('avatar','头像',['class'=>'col-sm-3 control-label']) !!}
                        <div class="col-sm-9">
                            <div class="avatar-upload">
                                <img src="/img/avatar.jpg" class="profile-avatar img-thumbnail"/>
                            </div>
                            {!! Form::file('avatar',['id'=>'uploadavatar']) !!}
                        </div>
                    </div>

                    {!! Form::bstext('username','账号') !!}

                    {!! Form::bspassword('password','密码') !!}

                    {!! Form::bstext('name','姓名') !!}

                    {!! Form::bselect('sex','性别', [ '0' => '未设置', '1' => '男', '2' => '女'], Auth::user()->sex) !!}

                    {!! Form::bstext('email','邮箱') !!}

                    {!! Form::bstext('mobile','手机') !!}

                    {!! Form::bselect('roles[]','角色',$roleOptions,null,['multiple'=>true,'class'=>'select2']) !!}

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button class="btn btn-default" type="reset">重置</button>
                            <button class="btn btn-primary" type="submit">保存</button>
                        </div>
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection