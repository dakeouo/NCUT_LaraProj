@extends('layouts.app')

@section('title','個人資訊')

@section('content')
<div class="content-head">@yield('title')</div>
@if (session('status'))
    <div class="alert-success" role="alert">{{ session('status') }}</div>
@endif
<div class="profile">
	<table><tr>
		<td width="200"><div class="table_img img_200" align="center">
			@if(file_exists(public_path().'/img/std/'.Auth::user()->uid.'.jpg'))
			<img src="{{ asset('img/std/'.Auth::user()->uid.'.jpg') }}">
			@elseif(file_exists(public_path().'/img/std/'.Auth::user()->uid.'.png'))
			<img src="{{ asset('img/std/'.Auth::user()->uid.'.png') }}">
			@else
			<img src="{{ asset('img/std/null.jpg') }}">
			@endif
		</div></td>	
		<td><div class="profile-info">
			<label class="std-name">{{ Auth::user()->name }}</label>
			<br /><br />
			<label class="std-id">
				<b>學號：</b>{{ Auth::user()->uid }}<br />
				<b>身分：</b>{{ Auth::user()->type }}<br />
				<b>電子郵件：</b>{{ Auth::user()->email }}<br />
				<b>會員註冊時間：</b>{{ Auth::user()->created_at }}<br />
				<b>資料更新時間：</b>{{ Auth::user()->updated_at }}<br />
			</label>
		</div></td>
	</tr><tr>
		<td colspan="2"><a href="#" class="std-button-warning" style="width: 100%; text-align: center;">修改個人資料</a></td>
	</tr></table>
</div>
@endsection
