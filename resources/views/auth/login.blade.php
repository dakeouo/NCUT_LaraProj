@extends('layouts.app')

@section('title','登入')

@section('content')
<div class="content-head">@yield('title')</div>
<form class="pure-form" method="POST" action="{{ route('login') }}">
    @csrf
    <fieldset>
        <div class="pure-control-group">
            <label for="email">電子信箱(s+學號+@student.ncut.edu.tw)</label>
            <input id="email" type="email" placeholder="E-mail" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>

        <div class="pure-control-group">
            <label for="password">密碼(預設為學號)</label>
            <input id="password" type="password" placeholder="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" value="{{ old('password') }}" required>
            @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
        </div>

        <label for="cb" class="pure-checkbox">
            <input id="remember" type="checkbox" name="remember" style="position: relative; width: 1em;" {{ old('remember') ? 'checked' : '' }}> 記住我
        </label>

        <button type="submit" class="std-button-primary">登入</button>

        @if (Route::has('password.request'))
        <a class="std-button-warning" href="{{ route('password.request') }}">
            忘記密碼
        </a>
        @endif
    </fieldset>
</form>
@endsection
