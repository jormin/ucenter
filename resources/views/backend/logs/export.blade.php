@extends('layouts.backend')

@section('content')
    <div class="col-md-12 col-sm-12">
        <div class="block-flat">
            <div class="header">
                <h3>
                    导出日志
                </h3>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12"><div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>导出时间</th>
                                    <th>导出账号</th>
                                    <th>导出类型</th>
                                    <th>导出文件</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($logs)>0)
                                    @foreach($logs as $log)
                                        <tr>
                                            <td>
                                                <span data-original-title="{{ $log->created_at }}" data-toggle="tooltip">
                                                    {{ $log->created_at->diffForHumans() }}
                                                </span>
                                            </td>
                                            <td><a href="{{ route('admins.edit',$log->user_id) }}" data-original-title="查看账号信息" data-toggle="tooltip">{{ $log->user->name }}({{$log->user->username}})</a></td>
                                            <td>
                                                @if($log->type === 'orders')
                                                    订单
                                                @endif
                                                @if($log->type === 'combinations')
                                                    合版
                                                @endif
                                            </td>
                                            <td><a href="{{ $log->filelink() }}" data-original-title="查看导出文件" data-toggle="tooltip">{{ $log->filename }}</a></td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4">
                                            暂时没有导出记录
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