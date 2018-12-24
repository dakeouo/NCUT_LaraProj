@extends('layouts.app')

@section('title','學生作業成績總覽')

@section('content')
<div class="content-head">@yield('title')</div>
@if (session('status'))
    <div class="alert-success" role="alert">{{ session('status') }}</div>
@endif

<table class="std_table" width="100%">
	<tbody align="center">
		<th align="center">學號</th>
		<th align="center">姓名</th>
		<th align="center">作業一</th>
		<th align="center">作業二</th>
		<th align="center">作業三</th>
		<th align="center">作業四</th>
		<th align="center">作業五</th>
		<th align="center">作業六</th>
		<th align="center">期末作業</th>
		<th align="center">平均</th>
	</tbody>
@if (count($users) > 0)
	@foreach($users as $std)
	<tr>
		<td>{{ $std->uid }}</td>
		<td>{{ $std->name }}</td>
		@for($i = 0;$i < 7;$i++)
			@if(isset($scores[$i][$std->uid]))
				<td>{{ $scores[$i][$std->uid] }}</td>
			@else
			<td>0</td>
			@endif
		@endfor
		<td>{{ $avg[$std->uid] }}</td>
	</tr>
	@endforeach
@endif
</table>
@endsection
