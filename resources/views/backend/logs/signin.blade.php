@extends('layouts.backend')

@section('content')
    <div class="col-md-12 col-sm-12">
        <div class="block-flat">
            <div class="header">
                <h3>
                    登录日志
                </h3>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12"><div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>登录时间</th>
                                    <th>登录IP</th>
                                    <th>登录地址</th>
                                    <th>退出时间</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($logs)>0)
                                    @foreach($logs as $log)
                                        <tr>
                                            <td>{{ $log->login_time }}</td>
                                            <td>{{ $log->ip }}</td>
                                            <td>{{ $log->ip_area }}</td>
                                            <td>{{ $log->logout_time }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4">
                                            暂时没有登录记录
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="pull-left">
                                        <div class="dataTables_info" id="datatable2_info">显示 {{ ($logs->currentPage() - 1) * $logs->perPage() + 1 }} 至 {{ ($logs->currentPage() - 1) * $logs->perPage() + $logs->count()}} 条，共 {{ $logs->total() }} 条记录。</div>
                                    </div>
                                    <div class="pull-right">
                                        {{ $logs->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

<script type="text/javascript" src="/backend/js/jquery.datatables/jquery.datatables.min.js"></script>
<script type="text/javascript" src="/backend/js/jquery.datatables/bootstrap-adapter/js/datatables.js"></script>
<script>
    $(document).ready(function() {
        App.dataTables();
    });
</script>
@endpush