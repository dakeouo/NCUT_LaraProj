@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="content-head">
	@if($hw->id > 10)
	[補交]
	@endif
	@yield('title')
	<div class="content-head-btn">
	@if(Auth::user()->type == "正式生")
		<a href="{{ url('home') }}" class="std-button-primary">返回</a>
	@else
		<a href="{{ url('homework') }}" class="std-button-primary">返回</a>
	@endif
	</div>
</div>
@if (session('status'))
    <div class="alert-success" role="alert">{{ session('status') }}</div>
@endif
<div style="color: #34495e;">{!! $hw->contect !!}</div>

@endsection
