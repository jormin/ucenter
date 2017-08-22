<a href="javascript:;" class="text-danger del-btn" data-model="admin" data-id="{{ $admin->id }}" data-original-title="删除" data-toggle="tooltip">
    [删除]
</a>
{!! Form::open(['method'=>'delete','route'=>['admins.destroy',$admin->id],'id'=>'delete-admin-form-'.$admin->id]) !!}
{!! Form::close() !!}