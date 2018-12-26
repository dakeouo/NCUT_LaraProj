@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="content-head">
	@if($hw->id > 10)
	[補交]
	@endif
	[@yield('title')]作業上傳系統
	<div class="content-head-btn">
		<a href="{{ url('home') }}" class="std-button-primary">返回</a>
	</div>
</div>
@if (session('status'))
    <div class="alert-success" role="alert">{{ session('status') }}</div>
@endif
<div class="profile-edit">
	<table>
		<tr><td width="200">
			<div class="table_img img_200" align="center">
				<img src="{{ asset('img/std/'.Auth::user()->path) }}">
			</div>
		</td></tr>
		<tr><td>
		<div class="profile-info" style="width: 540px; text-align: left;">
		<label class="std-id">
			<form class="pure-form pure-form-aligned" method="POST" action="{{ route('profile.edit') }}" enctype="multipart/form-data">{{ csrf_field() }}
				<b>作業上傳：</b><input type="file" name="stdFile" accept=".zip,.rar" style="position: relative; top: 7px; width: 350px;" value="{{ Auth::user()->path }}"><br />
				<b>姓名：{{ Auth::user()->name }}<br />
				<b>學號：{{ Auth::user()->uid }}<br />
				@if($hw->id < count($submit)+1)
		        @if($hw->id < count($submit))
		        <b>繳交時間：{{ $submit[$hw->id] }}<br />
	            @else
		        <b>繳交時間：{{ $submit[$hw->id] }}<br />
	            @endif
	            @else
		        <b>繳交時間：尚未繳交<br />
	            @endif
				<input type="submit" class="std-button-upload" value="上傳作業" style="width: 480px;">
			</form>
		</label>
		</div>
		</td></tr>
	</table>
</div>

@endsection
