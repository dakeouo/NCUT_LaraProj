@extends('layouts.app')

@section('title',$title)

@section('content')
<div class="content-head">
	@yield('title')
	<div class="content-head-btn">
		<a href="{{ url('choice') }}" class="std-button-primary">返回</a>
	</div>
</div>
@if (session('status'))
    <div class="alert-success" role="alert">{{ session('status') }}</div>
@endif

<div>
	<form class="pure-form pure-form-aligned" method="POST" action="{{ $action }}">
	{{ csrf_field() }}
	@if($FormType == "Edit")
	{{ method_field('PATCH') }}
	@endif
   	<fieldset>
   		<div class="pure-control-group">
            <label style="text-align: left;">章節</label>
            <select class="pure-input-1-1" name="chap">
            @for($i = 1;$i < count($chName);$i++)
            	@if(($FormType == "Edit")&&($choices->chap == $i))
            	<option value="{{ $i }}" selected>第{{ $chName[$i] }}章</option>
            	@else
            	<option value="{{ $i }}">第{{ $chName[$i] }}章</option>
            	@endif
            @endfor
            </select>
        </div>

        <div class="pure-control-group">
            <label style="text-align: left;">大題</label>
            <select class="pure-input-1-1" name="grop">
            @for($i = 1;$i < count($chName);$i++)
            	@if(($FormType == "Edit")&&($choices->grop == $i))
            	<option value="{{ $i }}" selected>第{{ $chName[$i] }}大題</option>
            	@else
            	<option value="{{ $i }}">第{{ $chName[$i] }}大題</option>
            	@endif
            @endfor
            </select>
        </div>

        <div class="pure-control-group">
            <label style="text-align: left;">題目</label>
            @if(($FormType == "Edit"))
            <input class="pure-input-1" type="text" name="question" value="{{ $choices->question }}" required>
            @else
            <input class="pure-input-1" type="text" name="question" required>
            @endif
        </div>

        <div class="pure-control-group">
            <label style="text-align: left;">選項</label>
            <fieldset class="pure-control-group">
            @if(($FormType == "Edit"))
            	<input type="text" class="pure-input-1" placeholder="選項 (A)" name="optionA" value="{{ $choices->option1 }}" required>
            	<input type="text" class="pure-input-1" placeholder="選項 (B)" name="optionB" value="{{ $choices->option2 }}" required>
            	<input type="text" class="pure-input-1" placeholder="選項 (C)" name="optionC" value="{{ $choices->option3 }}" required>
            	<input type="text" class="pure-input-1" placeholder="選項 (D)" name="optionD" value="{{ $choices->option4 }}" required>
			@else
            	@for($i = 1;$i < count($chAns);$i++)
            	<input type="text" class="pure-input-1" placeholder="選項 ({{ $chAns[$i] }})" name="option{{ $chAns[$i] }}" required>
            	@endfor
            @endif	
    		</fieldset>
        </div>

        <div class="pure-control-group">
            <label style="text-align: left;">答案</label>
            <select class="pure-input-1-1" name="ans">
            @for($i = 1;$i < count($chAns);$i++)
            	@if(($FormType == "Edit")&&($choices->ans == $i))
            	<option value="{{ $i }}" selected>{{ $chAns[$i] }}</option>
            	@else
            	<option value="{{ $i }}">{{ $chAns[$i] }}</option>
            	@endif
            @endfor
            </select>
        </div>
   	</fieldset>
   	@if($FormType == "Create")
   		<input type="submit" class="std-button-upload" value="新增題目">
   	@elseif($FormType == "Edit")
   		<input type="submit" class="std-button-warning" value="修改題目">
   	@endif
   	</form>
</div>

@endsection