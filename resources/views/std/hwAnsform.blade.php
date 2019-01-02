@extends('layouts.app')


@section('content')
<div class="content-head">
	<div class="content-head-btn">
		<a href="{{ url('home') }}" class="std-button-primary">返回</a>
	</div>
</div>
@if (session('status'))
    <div class="alert-success" role="alert">{{ session('status') }}</div>
@endif
{{$score}}<br />
@endsection
