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
						<a href="/homework/mark/{{ $id }}/{{ $user->uid }}">{{ $user->uid }}&nbsp;{{ $user->name }}</a>
					</font>
				</td>
			</tr></table>
		</div>
		@endforeach
		<div class="mark-nav-link">{!! $users->links() !!}</div>
	@endif
	</div>
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
			<td style="position: relative; left: 100px;">
				<font style="position: relative; top: -9px; font-size: 12px; margin-right: 10px;">選擇題分數</font>
				@if((count($submits) > 0)&&(isset($submits[$idt->uid])))
				<b style="font-size: 16px;"><font size="6">{{ $submits[$idt->uid]->choice }}</font></b>/10
				@else
				<b><font size="6">未填寫</font></b>
				@endif
			</td>
			<td style="position: relative; left: 200px;">
				<font style="position: relative; top: -9px; font-size: 12px; margin-right: 10px;">實作題檔案</font>
				@if((count($submits) > 0)&&(isset($submits[$idt->uid]))&&($submits[$idt->uid]->practice))
				<b><font size="6">已上傳</font></b>
				@else
				<b><font size="6">------</font></b>
				@endif
			</td>
			<td style="position: relative; left: 300px;">
				@if((count($submits) > 0)&&(isset($submits[$idt->uid])))
				<font style="position: relative; top: -3px; font-size: 12px; margin-right: 10px;">上傳日期</font>
				<b><font size="4">{{ $submits[$idt->uid]->created_at }}</font></b><br />
				<font style="position: relative; top: -3px; font-size: 12px; margin-right: 10px;">更新日期</font>
				<b><font size="4">{{ $submits[$idt->uid]->updated_at }}</font></b><br />
				@else
				<font style="position: relative; top: -3px; font-size: 12px; margin-right: 10px;">上傳日期</font>
				<b><font size="4">00-00-00 00:00:00</font></b><br />
				<font style="position: relative; top: -3px; font-size: 12px; margin-right: 10px;">更新日期</font>
				<b><font size="4">00-00-00 00:00:00</font></b><br />
				@endif
			</td>
		</tr></table>
		<hr style="color:#eee; position: relative; top: -10px;" />
	@else
		<label>請點選左側所列學員</label>
	@endif
	</div>
</div>
@endsection
