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
	<form class="pure-form" method="POST" action="">
	{{ csrf_field() }}
		<div class="pure-control-group pure-u-1">
			<div class="std_choice_head">
				{{ ++$count }}. {{ $ch->question }}
			</div>
			<label for="option-three" class="pure-radio">
				<input type="radio" name="ans[{{ $count-1 }}]" value="1" required>{{ $ch->option1 }}<br />
				<input type="radio" name="ans[{{ $count-1 }}]" value="2" required>{{ $ch->option2 }}<br />
				<input type="radio" name="ans[{{ $count-1 }}]" value="3" required>{{ $ch->option3 }}<br />
				<input type="radio" name="ans[{{ $count-1 }}]" value="4" required>{{ $ch->option4 }}<br />
			</label>
		</div>
		<input type="hidden" name="QA[{{ $count-1 }}]" value="{{ $ch->ans }}">
		@endforeach
		<input type="submit" class="std-button-upload" value="送出作答">
	</form>
	
@else
	<p align="center" style="font-size:28px;">此作業無選擇題作答</p>
@endif
    
@endsection
