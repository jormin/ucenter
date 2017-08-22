@extends('layouts.backend')

@section('content')
    <div class="col-sm-12">
        <div class="block-flat profile-info">
            <div class="row">
                <div class="col-sm-2">
                    <div class="avatar">
                        <img src="{{ Auth::user()->avatar }}" class="profile-avatar img-thumbnail" />
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="personal">
                        <h1 class="name">{{ Auth::user()->name }}</h1>
                        <p class="description">
                            <i class="fa fa-envelope-o">
                                {{ Auth::user()->email}}
                            </i>
                            <br>
                            <i class="fa fa-phone">
                                {{ Auth::user()->mobile}}
                            </i>
                        <p>
                        <a href="{{ route('users.profile') }}" data-original-title="修改资料" data-toggle="tooltip">[修改资料]</a>
                        <a href="{{ route('users.password') }}" data-original-title="修改密码" data-toggle="tooltip">[修改密码]</a>
                    </div>
                </div>
                <div class="col-sm-3 role-wrap">
                    <div class="header">
                        <h3>我的角色</h3>
                    </div>
                    <div class="content">
                        <ul class="items">
                            @foreach(Auth::user()->roles as $role)
                                <li>
                                    <button class="btn btn-primary btn-flat btn-rad" data-modal="reply-ticket">
                                        {{ $role->display_name }}
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-8">
            <div class="block-transparent">
                    <div class="header">
                        <h4>
                            Timeline
                            <span class="pull-right">
                            <a href="{{ route('logs.mine') }}" data-original-title="查看日志" data-toggle="tooltip"><i class="fa fa-plus"> 更多</i></a>
                        </span>
                        </h4>
                    </div>
                    @if(count($logs) > 0)
                        <ul class="timeline">
                            @foreach($logs as $log)
                                <li>
                                    <i class="fa fa-comment"></i>
                                    <span class="date">{{ date('m.d',strtotime($log->created_at)) }}</span>
                                    <div class="content">
                                        <p>
                                            {{ $log->description }}
                                        </p>
                                        <small>{{ $log->created_at->diffForHumans() }}</small>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <div class="text-center">
                            暂时没有操作记录
                        </div>
                    @endif
                </div>
        </div>
        <div class="col-sm-4 col-md-4 col-lg-4">
            <div class="block-transparent">
                <div class="header">
                    <h4>
                        今日统计
                    </h4>
                </div>
                @permission('index-statistics-heban')
                    <div class="block">
                        <div class="header">
                            <h4 >
                                合版
                            </h4>
                        </div>
                        <div class="content no-padding">
                            <div class="fact-data text-center">
                                <h3>客户</h3>
                                <h2><a href="{{ route('members.heban') }}" data-original-title="查看合版客户" data-toggle="tooltip">{{ $count->heban->member }}</a></h2>
                            </div>
                            <div class="fact-data text-center">
                                <h3>订单</h3>
                                <h2><a href="{{ route('orders.heban') }}" data-original-title="查看合版订单" data-toggle="tooltip">{{ $count->heban->order }}</a></h2>
                            </div>
                        </div>
                    </div>
                @endpermission
                @permission('index-statistics-special')
                    <div class="block">
                        <div class="header">
                            <h4>
                                专版
                            </h4>
                        </div>
                        <div class="content no-padding">
                            <div class="fact-data text-center">
                                <h3>客户</h3>
                                <h2><a href="{{ route('members.special') }}" data-original-title="查看专版客户" data-toggle="tooltip">{{ $count->special->member }}</a></h2>
                            </div>
                            <div class="fact-data text-center">
                                <h3>订单</h3>
                                <h2><a href="{{ route('orders.special') }}" data-original-title="查看专版订单" data-toggle="tooltip">{{ $count->special->order }}</a></h2>
                            </div>
                        </div>
                    </div>
                @endpermission
                @permission('index-statistics-money')
                    <div class="block">
                        <div class="header">
                            <h4>
                                金额（元）
                            </h4>
                        </div>
                        <div class="content no-padding">
                            <div class="fact-data text-center">
                                <h3>合版</h3>
                                <h2><a href="{{ route('statistics.money','heban') }}" data-original-title="查看合版金额统计" data-toggle="tooltip">{{ $count->heban->amount }}</a></h2>
                            </div>
                            <div class="fact-data text-center">
                                <h3>专版</h3>
                                <h2><a href="{{ route('statistics.money','special') }}" data-original-title="查看专版金额统计" data-toggle="tooltip">{{ $count->special->amount }}</a></h2>
                            </div>
                        </div>
                    </div>
                @endpermission
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
    .role-wrap ul{
        padding-left: 0;
    }
    .role-wrap .items li{
        list-style: none;
    }
</style>
@endpush