<a href="javascript:;" data-id="{{$menu->id}}" class="pull-right text-danger del-menu-btn" data-original-title="删除" data-toggle="tooltip">
    [删除]
</a>
{!! Form::open(['method'=>'delete','route'=>['menus.destroy',$menu->id],'id'=>'delete-menu-form-'.$menu->id,'style'=>'display:none']) !!}
{!! Form::close() !!}