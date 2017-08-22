<a href="javascript:;"  class="text-danger del-btn" data-model="perm" data-id="{{ $perm->id }}" data-original-title="删除" data-toggle="tooltip">
    [删除]
</a>
{!! Form::open(['method'=>'delete','route'=>['perms.destroy',$perm->id],'id'=>'delete-perm-form-'.$perm->id]) !!}
{!! Form::close() !!}
