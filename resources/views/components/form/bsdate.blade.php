<div class="form-group">
    <label class="col-sm-3 control-label">{{ $label }}</label>
    <div class="col-sm-6">
        <div class="input-group date datetime col-md-5 col-xs-7" data-start-view="{{ $startView }}" data-min-view="{{ $minView }}" data-date-format="{{ $format }}" data-date-language="zh-CN">
            {!! Form::text($name,null,array_merge(['class' => 'form-control','size'=>"16",'type'=>"text", 'readonly'=>"{{ $readonly }}"], $attributes)) !!}
            <span class="input-group-addon btn btn-primary"><span class="glyphicon glyphicon-th"></span></span>
        </div>
    </div>
</div>