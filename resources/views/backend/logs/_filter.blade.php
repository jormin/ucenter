<div class="row">
    {!! Form::open(['route'=>Route::currentRouteName(),'method'=>'get','id'=>'filter-log-form']) !!}
        <div class="col-md-9" style="padding-left: 0">
            @if(Route::currentRouteName() === 'logs.index')
                <div class="col-md-2">
                    {!! Form::select('user_id',$userOptions,$user_id,['class'=>'select2']) !!}
                </div>
            @endif
            <div class="col-md-2">
                {!! Form::select('subject_type',$subjectOptions,$subject_type,['class'=>'select2']) !!}
            </div>
        </div>
    {!! Form::close() !!}
</div>

@push('scripts')
<script>
    $("#filter-log-form select").change(function(){
        $("#filter-log-form").submit();
    })
    $("#filter-log-form .reset-btn").click(function(){
        $("#filter-log-form select").val(0);
        $("#filter-log-form input").val('');
        $("#filter-log-form").submit();
    })
</script>
@endpush