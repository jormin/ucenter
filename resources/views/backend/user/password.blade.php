@extends('layouts.backend')

@section('content')
    <div class="col-md-12">
        <div class="block-flat">
            <div class="header">
                <h3>
                    修改个人资料
                </h3>
            </div>
            <div class="content">
                {!! Form::open(['route'=>'users.changepassword','method'=>'post','class'=>'form-horizontal group-border-dashed']) !!}
                {!! Form::bspassword('password_old','旧密码') !!}
                {!! Form::bspassword('password','新密码') !!}
                {!! Form::bspassword('password_confirmation','重复新密码') !!}
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button class="btn btn-default">重置</button>
                        <button class="btn btn-primary" type="submit">保存</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection