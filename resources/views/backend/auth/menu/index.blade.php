@extends('layouts.backend')

@section('content')
    <div class="col-md-12 col-sm-12">
        <div class="block-flat">
            <div class="header">
                <h3>
                    当前菜单
                    <a href="{{ route('menus.create') }}" class="btn btn-success btn-xs" data-original-title="创建菜单" data-toggle="tooltip">
                        <i class="fa fa-plus"></i>
                    </a>
                </h3>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12 div-sm-12">
                        <div class="dd" id="list1">
                            <ol class="dd-list">
                                @each('backend.auth.menu._menu',$menus,'menu')
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('.dd').nestable({
            maxDepth:2
        });
        $(".del-menu-btn").click(function(e){
            var id = $(this).data('id');
            layer.confirm('确定要删除菜单吗，此操作不可恢复？', {
                btn: ['确定','取消']
            }, function(){
                $("#delete-menu-form-"+id).submit();
            });

        })
    </script>
@endpush

@push('styles')
    <style>
        .dd{
            max-width: 100%;
        }
        .dd-handle:hover{
            color: #ffffff;
            cursor: pointer;
        }
        .dd-handle:hover a{
            color: #fff;
            cursor: pointer;
        }
    </style>
@endpush