@extends('layouts.app')

@section('title',$title)

@section('content')
<div class="content-head">
	@if($id > 10)
	[補交]
	@endif
	@yield('title')
	<div class="content-head-btn">
		<a href="{{ url('homework') }}" class="std-button-primary">返回</a>
	</div>
</div>
@if (session('status'))
    <div class="alert-success" role="alert">{{ session('status') }}</div>
@endif
<div class="mark-container">
	<div class="mark-nav">
	@if(count($users) > 0)
		@foreach($users as $user)
		@if($idt->uid == $user->uid)
		<div class="mark-nav-item" isSelect="1">
		@else
		<div class="mark-nav-item">
		@endif
			<table style="position: relative; top: -5px;"><tr>
				<td><div class="table_img img_50" align="center">
					<img src="{{ asset('img/std/'.$user->path) }}">
				</div></td>
				<td style="position: relative; top: -5px; left: 10px;">
					<font style="font-size: 10px;">正式生</font><br />
					<font style="position: relative; top: -5px; font-size: 18px; font-weight: 500;">
						<a href="/homework/mark/{{ $id }}/{{ $user->uid }}">{{ $user->uid }}&nbsp;{{ $user->name }}</a>
					</font>
				</td>
			</tr></table>
		</div>
		@endforeach
	@endif
	</div>
	<div class="mark-contect">
	@if(count($idt) > 0)

	@else
		<label>請點選左側所列學員</label>
	@endif
	</div>
</div>

@endsection
