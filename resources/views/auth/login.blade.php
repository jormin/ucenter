@extends('layouts.backend')

@section('content')
    <div class="middle-login">
        <div class="block-flat">
            <div class="header">
                <h3 class="text-center">{{ config('app.name') }}</h3>
            </div>
            <div>
                {!! Form::open(['route'=>'login','method'=>'post','class'=>'form-horizontal','style'=>'margin-bottom: 0px !important;']) !!}
                <div class="content">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                {!! Form::text('username',null,['class'=>'form-control','placeholder'=>'请输入管理员账号']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                {!! Form::password('password',['class'=>'form-control','placeholder'=>'请输入密码']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            {!! Geetest::render() !!}
                        </div>
                    </div>
                </div>
                <div class="foot">
                    {!! Form::submit('登录',['class'=>'btn btn-primary','data-dismiss'=>'modal']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        @include('backend/common/copyright')
    </div>
@endsection