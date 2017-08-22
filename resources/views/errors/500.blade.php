@extends('layouts.error')

@section('content')
    <div class="page-error">
        <h1 class="number text-center">500</h1>
        <h2 class="description text-center">Something went wrong.</h2>
        <h3 class="text-center"> 糟糕，出了点内部错误，请联系超级管理员，<a href="javascript:history.back()">点击返回</a>。</h3>
    </div>
@endsection