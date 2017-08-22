@extends('layouts.backend')

@section('content')
    <div class="col-md-12">
        <div class="block-flat">
            <div class="header">
                <h3>
                    创建权限
                    <span class="pull-right">
                        <a href="{{ route('perms.index') }}">
                            <i class="fa fa-list"></i>
                        </a>
                    </span>
                </h3>
            </div>
            <div class="content">
                {!! Form::open(['route'=>'perms.store','method'=>'post','files'=>true,'class'=>'form-horizontal group-border-dashed']) !!}

                    {!! Form::bstext('name','英文名称') !!}

                    {!! Form::bstext('display_name','显示名称') !!}

                    {!! Form::bstextarea('description','描述') !!}

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