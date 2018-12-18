@extends('layouts.app')

@section('title','作業維護&批改')

@section('content')
<div class="content-head">
	@yield('title')
	<div class="content-head-btn">
		<a href="#" class="std-button-upload">新增作業項目</a>
	</div>
</div>
@if (session('status'))
    <div class="alert-success" role="alert">{{ session('status') }}</div>
@endif

<table class="std_table" width="100%">
	<tbody>
		<th>作業名稱</th>
		<th width="10%">比重</th>
		<th>作業說明</th>
		<th>修改項目</th>
		<th>批改作業</th>
		<th width="20%">開始時間</th>
		<th width="20%">結束時間</th>
	</tbody>
@if (count($homeworks) > 0)
	@foreach($homeworks as $hw)
	<tr>
		<td>{{ $HWname[$hw->id] }}</td>
		<td>{{ $hw->weight }}%</td>
		<td><a href="#" class="std-button-primary">說明</a></td>
		<td><a href="#" class="std-button-warning">修改</a></td>
		<td><a href="#" class="std-button-upload">批改</a></td>
		<td>{{ $hw->start_at }}</td>
		<td>{{ $hw->finish_at }}</td>
	</tr>
	@endforeach
@endif
</table>

@endsection
