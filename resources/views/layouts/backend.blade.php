<!DOCTYPE html>
<html lang="zh">
<head>
    <!-- 头部 -->
    @include('backend/common/header')
</head>
@if (Route::currentRouteName() == 'login')
    <body class='texture'>
        <div id="cl-wrapper" class="login-container">
            <!-- 正文 -->
            @yield('content')
        </div>
@else
    <body>
        <!-- 顶部导航栏 -->
        @include('backend/common/navbar_top')

        <div id="cl-wrapper" class="fixed-menu">
            <!-- 左侧导航栏 -->
            @include('backend/common/navbar_left')

            <!-- 正文 -->
            <div class="container-fluid">
                <div class="cl-mcont">
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
@endif
    <div id="loading-wrap">
        <span></span>
        <img src="/backend/images/loading.gif" alt="">
    </div>
<!-- 尾部 -->
@include('backend/common/footer')