@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="content-head">
	@if($hw->id > 10)
	[補交]
	@endif
	@yield('title')
	<div class="content-head-btn">
		<a href="{{ $backUrl }}" class="std-button-primary">返回</a>
	</div>
</div>
@if (session('status'))
    <div class="alert-success" role="alert">{{ session('status') }}</div>
@endif
<div style="color: #34495e;">{!! $hw->contect !!}</div>

@endsection
