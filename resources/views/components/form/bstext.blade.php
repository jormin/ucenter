<div class="form-group">
    {{ Form::label($name, $label, ['class' => 'col-sm-3 control-label']) }}
    <div class="col-sm-6">
        {{ Form::text($name, $value, array_merge(['class' => 'form-control'], $attributes)) }}
    </div>
</div>