@extends('layouts.backend')

@section('content')
    <div class="col-md-12">
        <div class="block-flat">
            <div class="header">
                <h3>
                    管理员
                    <a href="{{ route('admins.create') }}" class="btn btn-success btn-xs" data-original-title="创建账号" data-toggle="tooltip">
                        <i class="fa fa-plus"></i>
                    </a>
                </h3>
            </div>
            <div class="content">
                <div class="table-responsive">
                    <div class="row">
                        <div class="col-md-12">
                            @include('backend.auth.admin._admin')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-left">
                                        <div class="dataTables_info" id="datatable2_info">
                                            显示 {{ ($admins->currentPage() - 1) * $admins->perPage() + 1 }} 至 {{ ($admins->currentPage() - 1) * $admins->perPage() + $admins->count()}} 条，共 {{ $admins->total() }} 条记录。
                                        </div>
                                    </div>
                                    <div class="pull-right">
                                        {{ $admins->links() }}
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
    <script>
        $(".btn-cmd").click(function(){
            $(this).closest('form').attr('action',$(this).data('url')).submit()
        })
    </script>
@endpush

@push('styles')
    <style>
        .cmd-btn{
            margin-left: 5px;
        }
        .notify-wrap{
            position: absolute;
        }
    </style>
@endpush