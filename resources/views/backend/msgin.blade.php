@extends('layouts.backend')

@section('content')
	<div class="page-error">
		<h2 class="text-center">提示信息</h2>
		<h3 class="text-center">{{ $msg }}</h3>
		<h4 class="text-center">页面将在&nbsp;<span id="second">3</span>&nbsp;秒后跳转，您也可以<a href="{{ $url }}">立即跳转</a><br/></h4>
	</div>
@endsection

@push('scripts')
	<script>
		setInterval(function(){
			var cusecond = parseInt($("#second").text());
			if(cusecond > 0 ){
				$("#second").text(cusecond-1);
			}else{
				window.location.href = "{{ $url }}";
			}
		},1000);
	</script>
@endpush