@extends('layouts.app')

@section('title','作業管理')

@section('content')
<br /><br />
@if (session('status'))
    <div class="alert-success" role="alert">{{ session('status') }}</div>
@endif
<table><tr>
	<td><div class="table_img img_100" align="center">
	@if(file_exists(public_path().'/img/std/'.Auth::user()->uid.'.jpg'))
		<img src="{{ asset('img/std/'.Auth::user()->uid.'.jpg') }}">
	@elseif(file_exists(public_path().'/img/std/'.Auth::user()->uid.'.png'))
		<img src="{{ asset('img/std/'.Auth::user()->uid.'.png') }}">
	@else
		<img src="{{ asset('img/std/null.jpg') }}">
	@endif
	</div></td>	
	<td height="100px" style="padding: 0 20px;">
		<label class="std-name">{{ Auth::user()->name }}</label><br />
		身分：{{ Auth::user()->type }}<br />
		學號：{{ Auth::user()->uid }}<br />
	</td>
</tr></table>
<hr style="color:#eee;" />
<table class="std_table" width="100%">
	<tbody>
		<th width="10%">項目</th>
		<th width="8%">比重</th>
		<th width="20%">繳交期限</th>
		<th width="10%">作業說明</th>
		<th width="10%">選擇題</th>
		<th width="10%">實作題</th>
		<th width="16%">最後繳交時間</th>
		<th width="8%">作業分數</th>
		<th width="">評語</th>
	</tbody>
	<tr>
		<td>作業一</td>
		<td>100%</td>
		<td>從2018-05-04 00:00:00<br />至2019-08-07 23:59:00</td>
		<td><a href="#" class="std-button-primary">說明</a></td>
		<td><a href="#" class="std-button-warning">作答</a></td>
		<td><a href="#" class="std-button-upload">上傳</a></td>
		<td>尚未繳交</td>
		<td>0</td>
		<td><div class="std-button-disabled">觀看</div></td>
	</tr>
	<tr>
		<td>作業二</td>
		<td>100%</td>
		<td>從2018-05-04 00:00:00<br />至2019-08-07 23:59:00</td>
		<td><a href="#" class="std-button-primary">說明</a></td>
		<td><font size="6">8</font> / 10</td>
		<td>已上傳</td>
		<td>2018-05-04 13:14:52</td>
		<td>87</td>
		<td><a href="#" class="std-button-primary">觀看</a></td>
	</tr>
	<tr>
		<td>作業三</td>
		<td>100%</td>
		<td>從2017-05-04 00:00:00<br />至2017-08-07 23:59:00</td>
		<td><a href="#" class="std-button-primary">說明</a></td>
		<td><div class="std-button-disabled">作答</div></td>
		<td><div class="std-button-disabled">上傳</div></td>
		<td>尚未繳交</td>
		<td>0</td>
		<td><a href="#" class="std-button-primary">觀看</a></td>
	</tr>
</table>
@endsection
