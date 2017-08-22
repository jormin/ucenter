@extends('layouts.backend')

@section('content')
    <div class="col-sm-12 col-md-12">
        <ul class="nav nav-tabs">
            <li @if($type === 'size') class="active" @endif>
                <a href="{{ route('configs.option','size') }}">尺寸</a>
            </li>
            <li @if($type === 'grams') class="active" @endif>
                <a href="{{ route('configs.option','grams') }}">克数</a>
            </li>
            <li @if($type === 'pagetype') class="active" @endif>
                <a href="{{ route('configs.option','pagetype') }}">纸张</a>
            </li>
            <li @if($type === 'area') class="active" @endif>
                <a href="{{ route('configs.option','area') }}">区域</a>
            </li>
            <li @if($type === 'technics') class="active" @endif>
                <a href="{{ route('configs.option','technics') }}">工艺</a>
            </li>
            <li @if($type === 'rate') class="active" @endif>
                <a href="{{ route('configs.option','rate') }}">评级</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active cont">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::open(['route'=>'configs.store','method'=>'post']) !!}
                        <span class="input-group col-md-4">
                            {!! Form::hidden('type',$type) !!}
                            {!! Form::text('value',null,['class'=>'form-control','placeholder'=>'请填写配置值','required'=>true]) !!}
                            <span class="input-group-btn">
                                {!! Form::submit('添加',['class'=>'btn btn-primary']) !!}
                            </span>
                        </span>
                        {!! Form::close() !!}
                    </div>
                </div>
                @include('backend.config._configs')
            </div>
        </div>
    </div>
@endsection