@extends('layouts.backend')

@section('content')
    <div class="col-md-12">
        <div class="block-flat">
            <div class="header">
                <h3>
                    权限
                    <a href="{{ route('perms.create') }}" class="btn btn-success btn-xs" data-original-title="创建权限" data-toggle="tooltip">
                        <i class="fa fa-plus"></i>
                    </a>
                </h3>
            </div>
            <div class="content">
                <div class="table-responsive">
                    <div class="row">
                        <div class="col-md-12">
                            @include('backend.auth.perm._perm')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-left">
                                        <div class="dataTables_info" id="datatable2_info">
                                            显示 {{ ($perms->currentPage() - 1) * $perms->perPage() + 1 }} 至 {{ ($perms->currentPage() - 1) * $perms->perPage() + $perms->count()}} 条，共 {{ $perms->total() }} 条记录。
                                        </div>
                                    </div>
                                    <div class="pull-right">
                                        {{ $perms->links() }}
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