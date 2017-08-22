@extends('layouts.backend')

@section('content')
    <div class="col-md-12">
        <div class="block-flat">
            <div class="header">
                <h3>
                    角色
                    <a href="{{ route('roles.create') }}" class="btn btn-success btn-xs" data-original-title="创建角色" data-toggle="tooltip">
                        <i class="fa fa-plus"></i>
                    </a>
                </h3>
            </div>
            <div class="content">
                <div class="table-responsive">
                    <div class="row">
                        <div class="col-md-12">
                            @include('backend.auth.role._role')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-left">
                                        <div class="dataTables_info" id="datatable2_info">
                                            显示 {{ ($roles->currentPage() - 1) * $roles->perPage() + 1 }} 至 {{ ($roles->currentPage() - 1) * $roles->perPage() + $roles->count()}} 条，共 {{ $roles->total() }} 条记录。
                                        </div>
                                    </div>
                                    <div class="pull-right">
                                        {{ $roles->links() }}
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