@extends('layouts.app')

@section('title','修改個人資訊')

@section('content')
<div class="content-head">
	@yield('title')
	<div class="content-head-btn">
		<a href="{{ url('profile') }}" class="std-button-primary">返回</a>
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
				<b>大頭照：</b><input type="file" name="stdFile" accept=".jpg,.jpeg,.png" style="position: relative; top: 7px; width: 350px;" value="{{ Auth::user()->path }}"><br />
				<b>姓名：</b><input type="text" name="name" style="position: relative; top: 7px; width: 420px; height: 35px;" value="{{ Auth::user()->name }}"><br />
				<b>學號：</b><input type="text" name="uid" style="position: relative; top: 7px; width: 420px; height: 35px;" value="{{ Auth::user()->uid }}" disabled><br />
				<b>身分：</b><input type="text" name="type" style="position: relative; top: 7px; width: 420px; height: 35px;" value="{{ Auth::user()->type }}" disabled><br />
				<b>電子郵件：</b><input type="email" name="email" style="position: relative; top: 7px; width: 380px; height: 35px;" value="{{ Auth::user()->email }}"><br />
				<input type="submit" class="std-button-upload" value="修改個人資料" style="width: 480px;">
			</form>
		</label>
		</div>
		</td></tr>
	</table>
</div>
@endsection
