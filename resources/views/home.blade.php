@extends('layouts.app')

@section('title','Dashboard')

@section('content')
<div class="content-head">@yield('title')</div>
@if (session('status'))
    <div class="alert-success" role="alert">{{ session('status') }}</div>
@endif
You are logged in!
@endsection
