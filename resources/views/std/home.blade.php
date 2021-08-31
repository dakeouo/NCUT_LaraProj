@extends('layouts.app')

@section('title','作業管理')

@section('content')
<br /><br />
@if (session('status'))
    <div class="alert-success" role="alert">{{ session('status') }}</div>
@endif
<table><tr>
	<td><div class="table_img img_100" align="center">
		<img src="{{ asset('img/std/'.Auth::user()->path) }}">
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
@if (count($homeworks) > 0) 
	@foreach($homeworks as $hw)	
	<tr>
		<td>{{ $HWname[$hw->id] }}</td>
		<td>{{ $hw->weight }}%</td>
		<td>從{{ $hw->start_at }}<br />至{{ $hw->finish_at }}</td>
		<td><a href="{{ $hw->id }}" class="std-button-primary">說明</a></td>
		
        @if(isset($choice[$hw->id])&&(!is_null($choice[$hw->id])))
		<td><b><font size="6">{{ $choice[$hw->id]}}</font></b>/10</td>
	    @elseif((strtotime("now") > strtotime($hw->start_at))&&(strtotime("now") < strtotime($hw->finish_at)))
		<td><a href="{{ url('choice/hwAns') }}/{{ $hw->id }}" class="std-button-warning">作答</a></td>
	    @else
		<td><div class="std-button-disabled">作答</div></td>
	    @endif
		@if(isset($submit[$hw->id])&&($submit[$hw->id] == 1))
		<td>已上傳</td>
	    @elseif((strtotime("now") > strtotime($hw->start_at))&&(strtotime("now") < strtotime($hw->finish_at)))
		<td><a href="{{ url('homework/hwPractice') }}/{{ $hw->id }}" class="std-button-upload">上傳</a></td>
	    @else
		<td><div class="std-button-disabled">上傳</div></td>
	    @endif
		
		@if(isset($update[$hw->id]))
		<td>{{ $update[$hw->id] }}</td>
	    @else
		<td>尚未繳交</td>
	    @endif
		
		@if(isset($scores[$hw->id]))
		<td>{{ $scores[$hw->id] }}</td>
		@else
		<td>0</td>
		@endif
		<td>
		@if(isset($scores[$hw->id]))
		<a href="{{ url('homework/hwScore') }}/{{ $hw->id }}" class="std-button-primary">觀看</a>
	    @else
		<div class="std-button-disabled">觀看</div>		
		@endif
		</td>
	</tr>
	@endforeach
@endif
</table>
@endsection
