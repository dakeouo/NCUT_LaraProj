<?php session_start(); ?>
<div class="header">
    <div class="home-menu pure-menu pure-menu-horizontal pure-menu-fixed">
        <a class="pure-menu-heading" href="{{ url('/') }}">
        	學生作業管理系統
    	</a>
        <ul class="pure-menu-list">
        @guest
        	<li class="pure-menu-item"><a href="{{ route('login') }}" class="pure-menu-link">登入</a></li>
        	@if (Route::has('register'))
        	<li class="pure-menu-item"><a href="{{ route('register') }}" class="pure-menu-link">註冊</a></li>
        	@endif
        @else
        	<li class="pure-menu-item  pure-menu-has-children pure-menu-allow-hover"><a href="#" class="pure-menu-link">使用者：{{ Auth::user()->name }}</a>
        	<ul class="pure-menu-children">
        		<li class="pure-menu-item"><a href="{{ route('logout') }}" class="pure-menu-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">登出</a>
        			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf</form>
        		</li>
            </ul>
        @endguest
        </ul>
    </div>
</div>
