@extends('layouts.app')

@section('title','重置密碼')

@section('content')
<div class="content-head">@yield('title')</div>
<form class="pure-form" method="POST" action="{{ route('password.update') }}">
    @csrf
    <fieldset>
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="pure-control-group">
            <label for="email">電子郵件</label>
            <input id="email" type="email" placeholder="E-mail" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="pure-control-group">
            <label for="password">密碼</label>
            <input id="password" type="password" placeholder="Password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" value="{{ old('password') }}" required>
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="pure-control-group">
            <label for="password-confirm">確認密碼</label>
            <input id="password-confirm" type="password" placeholder="Confirm Password" name="password_confirmation" class="form-control" required>
        </div>
        <button type="submit" class="std-button-upload">重置密碼</button>
    </fieldset>
</form>
@endsection
