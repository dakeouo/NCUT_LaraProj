@extends('layouts.app')

@section('title',$title)

@section('content')
<div class="content-head">
	@yield('title')
	<div class="content-head-btn">
		<a href="{{ url('homework') }}" class="std-button-primary">返回</a>
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
            <label style="text-align: left;">類別</label>
            <select class="pure-input-1-1" name="hwType">
            @for($i = 0;$i < count($hwType);$i++)
                @if(($FormType == "Edit")&&($homeworks->hwType == $i))
                <option value="{{ $i }}" selected>{{ $hwType[$i] }}</option>
                @else
                <option value="{{ $i }}">{{ $hwType[$i] }}</option>
                @endif
            @endfor
            </select>
        </div>

        <div class="pure-control-group">
            <label style="text-align: left;">作業名稱</label>
            <select class="pure-input-1-1" name="hwNo">
            @for($i = 0;$i < count($hwName);$i++)
                @if(($FormType == "Edit")&&(($homeworks->hwNo)%10 == $i))
                <option value="{{ $i }}" selected>{{ $hwName[$i] }}</option>
                @else
                <option value="{{ $i }}">{{ $hwName[$i] }}</option>
                @endif
            @endfor
            </select>
        </div>

        <div class="pure-control-group">
            <table><tr>
                <td><label style="text-align: left;">比重</label></td>
                <td>
                @if($FormType == "Edit")
                    <input id="weight" width="200" name="weight" value="{{ $homeworks->weight }}" />
                @else
                    <input id="weight" width="200" name="weight" />
                @endif
                </td>
                <td><span id="value"></span>%</td>
            </tr></table>
        </div>

        <div class="pure-control-group">
            <table><tr>
                <td><label style="text-align: left;">起始時間</label></td>
                <td>
                @if($FormType == "Edit")
                    <input id="sTime" width="200" name="startTime" value="{{ $homeworks->startTime }}" />
                @else
                    <input id="sTime" width="200" name="startTime" />
                @endif
                </td>
            </tr></table>
            </div>
                    
            <div class="pure-control-group">
            <table><tr>
                <td><label style="text-align: left;">結束時間</label></td>
                <td>
                @if($FormType == "Edit")
                    <input id="eTime" width="200" name="endTime" value="{{ $homeworks->endTime }}" />
                @else
                    <input id="eTime" width="200" name="endTime" />
                @endif
                </td>
            </tr></table>
        </div>

        <div class="pure-control-group">
            <label style="text-align: left;">作業說明</label>
            <textarea id="hwText" name="hwText">
            @if($FormType == "Edit")
                {{ $homeworks->hwText }}
            @endif
            </textarea>
        </div>

   	</fieldset>
   	@if($FormType == "Create")
   		<input type="submit" class="std-button-upload" value="新增作業項目">
    </form>
   	@elseif($FormType == "Edit")
   		<input type="submit" class="std-button-warning" value="修改作業項目">
    </form>
    <form action="{{ url('homework/delete') }}/{{ $homeworks->hwNo }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <input type="submit" class="std-button-error" value="刪除作業項目" style="width: 100%;">
    </form>
   	@endif
</div>

<script>
    $('#sTime').datetimepicker({ footer: true, modal: true, format: 'yyyy-mm-dd HH:MM'});
    $('#eTime').datetimepicker({ footer: true, modal: true, format: 'yyyy-mm-dd HH:MM'});
    $('#weight').slider({
        min: 0,
        max: 100,
        slide: function (e, value) {
            document.getElementById('value').innerText = value;
        }
    });
    $(document).ready(function () {
        $("#hwText").editor();
    });
</script>

@endsection