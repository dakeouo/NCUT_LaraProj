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
    <div class="alert-success" role="alert">{!! session('status') !!}</div>
@endif
<div class="mark-container"><table><tr><td style="vertical-align:text-top;">
	<div class="mark-nav">
	@if(count($users) > 0)
		@foreach($users as $user)
		@if((count($idt) > 0)&&($idt->uid == $user->uid))
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
						<a href="{{ url('homework/mark') }}/{{ $id }}/{{ $user->uid }}">{{ $user->uid }}&nbsp;{{ $user->name }}</a>
					</font>
				</td>
			</tr></table>
		</div>
		@endforeach
		<div class="mark-nav-link">{!! $users->links() !!}</div>
	@endif
	</div></td><td style="vertical-align:text-top;">
	<div class="mark-contect">
	@if(count($idt) > 0)
		<table style="position: relative; top: -5px;"><tr>
			<td><div class="table_img img_50" align="center">
				<img src="{{ asset('img/std/'.$idt->path) }}">
			</div></td>
			<td style="position: relative; top: -5px; left: 10px;">
				<font style="font-size: 10px;">正式生</font><br />
				<font style="position: relative; top: -5px; font-size: 18px; font-weight: 500;">
					{{ $idt->uid }}&nbsp;{{ $idt->name }}
				</font>
			</td>
			<td style="position: relative; left: 60px;">
				<font style="position: relative; top: -9px; font-size: 12px; margin-right: 10px;">選擇題分數</font>
				@if((count($submits) > 0)&&(isset($submits[$idt->uid])))
				<b style="font-size: 16px;"><font size="6">{{ $submits[$idt->uid]->choice }}</font></b>/10
				@else
				<b><font size="6">未填寫</font></b>
				@endif
			</td>
			<td style="position: relative; left: 120px;">
				<font style="position: relative; top: -9px; font-size: 12px; margin-right: 10px;">實作題檔案</font>
				@if((count($submits) > 0)&&(isset($submits[$idt->uid]))&&($submits[$idt->uid]->practice))
				<b><font size="6">已上傳</font></b>
				@else
				<b><font size="6">-----</font></b>
				@endif
			</td>
			<td style="position: relative; left: 180px;">
				@if((count($submits) > 0)&&(isset($submits[$idt->uid])))
				<font style="position: relative; top: -3px; font-size: 12px; margin-right: 10px;">繳交日期</font>
				<b><font size="4">{{ $submits[$idt->uid]->created_at }}</font></b><br />
				<font style="position: relative; top: -3px; font-size: 12px; margin-right: 10px;">更新日期</font>
				<b><font size="4">{{ $submits[$idt->uid]->updated_at }}</font></b><br />
				@else
				<font style="position: relative; top: -3px; font-size: 12px; margin-right: 10px;">繳交日期</font>
				<b><font size="4">00-00-00 00:00:00</font></b><br />
				<font style="position: relative; top: -3px; font-size: 12px; margin-right: 10px;">更新日期</font>
				<b><font size="4">00-00-00 00:00:00</font></b><br />
				@endif
			</td>
		</tr></table>
		<hr style="color:#eee; position: relative; top: -10px;" />
		<div class="mark-contect-form">
			<b>上傳附檔</b><br />
			<div class="mark-form-dir">
			@if(Count($dir) > 0)
				@foreach($dir as $file)
				@if(($file != ".")&&($file != ".."))
					@if(is_dir(public_path().'/hw/'.$id.'/'.$idt->uid.'/'.$file))
					<img src="{{ asset('img/folder_icon.png') }}" style="position: relative; top: 3px;">
					{!! $file !!}<br />
					@else
					<img src="{{ asset('img/file_icon.png') }}" style="position: relative; top: 3px;">
					<a href="/hw/{{ $id }}/{{ $idt->uid }}/{{ $file }}">
					{!! $file !!}</a><br />
					@endif
				@endif
				@endforeach
			@else
				無附檔
			@endif
			</div>
			<br />
			<form class="pure-form pure-form-aligned" method="POST" action="" >
				{{ csrf_field() }}
				<b>成績</b>
				@if((count($HW) > 0)&&(isset($HW[$idt->uid])))
				<input type="text" name="score" class="mark-form-input" value="{{ $HW[$idt->uid]->Score }}">
				@else
				<input type="text" name="score" class="mark-form-input" value="">
				@endif
				<b>評語</b>
				@if((count($HW) > 0)&&(isset($HW[$idt->uid])))
				<input type="text" name="comment" class="mark-form-input" value="{{ $HW[$idt->uid]->Comment }}">
				@else
				<input type="text" name="comment" class="mark-form-input" value="">
				@endif

				@if(isset($HW[$idt->uid]))
				<input type="hidden" name="mode" value="1">
				@else
				<input type="hidden" name="mode" value="0">
				@endif
				<br /><br />
				<input type="submit" class="std-button-upload" value="送出成績">
			</form>
		</div>
	@else
		<label>請點選左側所列學員</label>
	@endif
	</td></tr></table>
	</div>
</div>
@endsection
