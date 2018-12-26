@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="content-head">
	@if($hw->id > 10)
	[補交]
	@endif
	@yield('title')選擇題作答(每題1分/共10分)
	<div class="content-head-btn">
		<a href="{{ url('home') }}" class="std-button-primary">返回</a>
	</div>
</div>
@if (session('status'))
    <div class="alert-success" role="alert">{{ session('status') }}</div>
@endif
@if (count($choices) > 0)
	@foreach($choices as $ch)
	<tr>
		<td style="text-align: left;">{{ $ch->question }}</br></td>
		<font color="blue"><input type="radio" class="pure-input-1" placeholder="選項 (A)" name="optionA"  required>{{ $ch->option1 }}</br></font>
        <font color="blue"><input type="radio" class="pure-input-1" placeholder="選項 (B)" name="optionB"  required>{{ $ch->option2 }}</br></font>
        <font color="blue"><input type="radio" class="pure-input-1" placeholder="選項 (C)" name="optionC"  required>{{ $ch->option3 }}</br></font>
        <font color="blue"><input type="radio" class="pure-input-1" placeholder="選項 (D)" name="optionD"  required>{{ $ch->option4 }}</br></font>
	</tr>
	@endforeach
@endif
    <input type="submit" class="std-button-upload" value="送出作答">

@endsection
