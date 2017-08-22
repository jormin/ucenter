<input class="switch" data-size="small" name="is_active" type="checkbox" data-model="admin" data-id="{{ $admin->id }}" @if($admin->is_active === 1) checked @endif />
{!! Form::open(['method'=>'post','route'=>['admins.active',$admin->id],'id'=>'active-admin-form-'.$admin->id]) !!}
    {!! Form::hidden('is_active') !!}
{!! Form::close() !!}