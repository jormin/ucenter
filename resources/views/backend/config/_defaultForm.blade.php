<a href="javascript:;" data-id="{{$config->id}}" data-model="config" class="default-btn" data-original-title="设为默认" data-toggle="tooltip">
    [设为默认]
</a>
{!! Form::open(['method'=>'post','route'=>['configs.default',$config->id],'id'=>'default-config-form-'.$config->id,'style'=>'display:none']) !!}
{!! Form::close() !!}