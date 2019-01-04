@extends('layouts.app')

@section('title', $title)

@section('content')
@if (session('status'))
    <div class="alert-success" role="alert">{{ session('status') }}</div>
@endif
<div class="profile-edit">
	<table>
	@if($hw->id > 10)
	<b>[補交]</b>
	@endif
	<b><font size="6">[@yield('title')]作業上傳系統</font></b>
	<div class="content-head-btn">
		<a href="{{ url('home') }}" class="std-button-primary">返回</a>
	</div>
		<tr><td width="200">
		</td></tr>
		<tr><td>
		<div class="profile-info" style="width: 540px; text-align: left;">
		<label class="std-id">
			<form class="pure-form pure-form-aligned" method="POST" action="{{ $action }}" enctype="multipart/form-data">{{ csrf_field() }}
				<b>作業上傳：</b><input type="file" name="stdFile" accept=".zip,.rar" style="position: relative; top: 7px; width: 350px;" value="{{ Auth::user()->path }}"><br />
				@if(isset($submit[$hw->id])&&($submit[$hw->id] == 1))
		        <b>繳交狀態 : 已繳交<br />
	            @else
		        <b>繳交狀態：尚未繳交<br />
	            @endif
				<b>開始時間：{{ $hw->start_at }}<br />
				<b>截止時間：{{ $hw->finish_at }}<br />
				<input type="submit" class="std-button-upload" value="上傳作業" style="width: 480px;">
			</form>
		</label>
		</div>
		</td></tr>
	</table>
</div>

@endsection
