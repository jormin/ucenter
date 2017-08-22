@extends('layouts.error')

@section('content')
    <div class="page-error">
        <h1 class="number text-center">404</h1>
        <h2 class="description text-center">Not Found.</h2>
        <h3 class="text-center"> 您访问的页面不存在，<a href="javascript:history.back()">点击返回</a>。</h3>
    </div>
@endsection