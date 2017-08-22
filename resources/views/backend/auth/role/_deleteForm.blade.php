<a href="javascript:;" class="text-danger del-btn" data-model="role" data-id="{{ $role->id }}" data-original-title="删除" data-toggle="tooltip">
    [删除]
</a>
{!! Form::open(['method'=>'delete','route'=>['roles.destroy',$role->id],'id'=>'delete-role-form-'.$role->id]) !!}
{!! Form::close() !!}
