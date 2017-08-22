@extends('layouts.error')

@section('content')
    <div class="content">
        <div class="title">503 Be right back.</div>
    </div>
    <div class="page-error">
        <h1 class="number text-center">503</h1>
        <h2 class="description text-center">Service Unavailable.</h2>
        <h3 class="text-center"> 出了点异常，重试下没准能解决，<a href="javascript:history.back()">点击返回</a>。</h3>
    </div>
@endsection