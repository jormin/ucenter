<a href="javascript:;" data-id="{{$config->id}}" data-model="config" class="text-danger del-btn" data-original-title="删除" data-toggle="tooltip">
    [删除]
</a>
{!! Form::open(['method'=>'delete','route'=>['configs.destroy',$config->id],'id'=>'delete-config-form-'.$config->id,'style'=>'display:none']) !!}
{!! Form::close() !!}