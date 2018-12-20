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
   	<fieldset>
   		<div class="pure-control-group">
            <label style="text-align: left;">章節</label>
            <select class="pure-input-1-1" name="chap">
            @for($i=1;$i<=7;$i++)
            	<option value="{{ $i }}">第{{ $chName[$i] }}章</option>
            @endfor
            </select>
        </div>

        <div class="pure-control-group">
            <label style="text-align: left;">大題</label>
            <select class="pure-input-1-1" name="grop">
            @for($i=1;$i<=6;$i++)
            	<option value="{{ $i }}">第{{ $chName[$i] }}大題</option>
            @endfor
            </select>
        </div>

        <div class="pure-control-group">
            <label style="text-align: left;">題目</label>
            <input class="pure-input-1" type="text" name="question" required>
        </div>

        <div class="pure-control-group">
            <label style="text-align: left;">選項</label>
            <fieldset class="pure-control-group">
            @for($i=1;$i<=4;$i++)
            	<input type="text" class="pure-input-1" placeholder="選項 ({{ $chAns[$i] }})" name="option{{ $chAns[$i] }}" required>
            @endfor	
    		</fieldset>
        </div>

        <div class="pure-control-group">
            <label style="text-align: left;">答案</label>
            <select class="pure-input-1-1" name="ans">
            @for($i=1;$i<=4;$i++)
            	<option value="{{ $i }}">{{ $chAns[$i] }}</option>
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