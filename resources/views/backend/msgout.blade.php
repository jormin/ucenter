@extends('layouts.backend')

@section('content')
	<div class="middle-login">
		<div class="block-flat">
			<div class="header">							
				<h3 class="text-center">登录失败</h3>
			</div>
			<div style="margin-bottom: 0px !important;" class="form-horizontal" action="{{ url('admin/login') }}" method="post">
				<div class="content">
					<h5 class="title text-center"> <strong>{{$msg}}</strong>
					</h5>
					<hr>
					<div align="center">
						<a class="btn btn-success btn-rad" href="/admin/login">重新登录</a>
					</div>
				</div>
			</div>
		</div>
    	@include('backend/common/copyright')
	</div> 
@endsection