@extends('layouts.app')

@section('title','忘記密碼')

@section('content')

<div class="content-head">@yield('title')</div>
@if (session('status'))
    <div class="alert-success" role="alert">{{ session('status') }}</div>
@endif
<form class="pure-form" method="POST" action="{{ secure_route('password.email') }}">
    @csrf
    <fieldset>
       <div class="pure-control-group">
            <label for="email">電子郵件</label>
            <input id="email" type="email" placeholder="E-mail" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <button type="submit" class="std-button-warning">傳送密碼重置連結</button>
    </fieldset>
</form>
@endsection
