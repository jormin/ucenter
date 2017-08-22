@extends('layouts.backend')

@section('content')
    <div class="col-md-12 col-sm-12">
        <div class="block-flat">
            <div class="header">
                <h3>
                    日志列表
                </h3>
            </div>
            <div class="content">
                <div class="table-responsive">
                    @include('backend.logs._filter')
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    @if(Route::currentRouteName() === 'logs.index')
                                        <th>账号</th>
                                    @endif
                                    <th>版块</th>
                                    <th>操作</th>
                                    <th>时间</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($logs)>0)
                                    @foreach($logs as $log)
                                        <tr>
                                            @if(Route::currentRouteName() === 'logs.index')
                                                <td><a href="{{ route('admins.edit',$log->causer->id) }}" data-original-title="查看账号信息" data-toggle="tooltip">{{ $log->causer->name }}</a></td>
                                            @endif
                                            <td>
                                                {{ $subjectOptions[explode('\\',$log->subject_type)[2]] }}
                                            </td>
                                            <td class="text-left">{{ $log->description }}</td>
                                            <td>
                                                <span data-original-title="{{ $log->created_at }}" data-toggle="tooltip">
                                                    {{ $log->created_at->diffForHumans() }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        @if(Route::currentRouteName() === 'logs.index')
                                            <td colspan="4">
                                        @else
                                            <td colspan="3">
                                        @endif
                                            暂时没有日志记录
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