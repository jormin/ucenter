<div id="head-nav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="fa fa-gear"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">
                <span>{{ config('app.name') }}</span>
            </a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right user-nav" data-position="auto"  data-position="bottom-left-aligned" data-step="3" data-intro="hello intro">
                <li class="dropdown profile_menu">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                        <img alt="Avatar" src="{{ Auth::user()->avatar }}" width="30" height="30"/>
                        <span>{{ Auth::user()->name }}</span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ url('/') }}"><i class="fa fa-home"></i> 管理中心</a>
                        </li>
                        <li>
                            <a href="{{ route('users.profile') }}"><i class="fa fa-user"></i> 修改资料</a>
                        </li>
                        <li>
                            <a href="{{ route('users.password') }}"><i class="fa fa-lock"></i> 修改密码</a>
                        </li>
                        <li>
                            <a href="{{ route('logs.signin') }}"><i class="fa fa-file-text-o"></i> 登录日志</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="javascript:;" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i> 退出登录</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>

@push('styles')
<style>
    .navbar-brand{background: none !important;padding-left: 6px !important;}
</style>
@endpush