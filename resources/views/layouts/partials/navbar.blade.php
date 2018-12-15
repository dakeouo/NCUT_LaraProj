<?php session_start(); ?>
<div class="header">
    <div class="home-menu pure-menu pure-menu-horizontal pure-menu-fixed">
        <a class="pure-menu-heading" href="{{ url('/') }}">
        	學生作業管理系統
    	</a>
        @if(Auth::user())
        <label style="position: relative; top: 2px; color: #1f8dd6;">
            使用者：{{ Auth::user()->name }}({{ Auth::user()->type }})
        </label>
        @endif
        <ul class="pure-menu-list">
        @guest
        	<li class="pure-menu-item"><a href="{{ route('login') }}" class="pure-menu-link">登入</a></li>
        	@if (Route::has('register'))
        	<li class="pure-menu-item"><a href="{{ route('register') }}" class="pure-menu-link">註冊</a></li>
        	@endif
        @else
            @if(Auth::user()->type == "正式生")
        	<li class="pure-menu-item"><a href="{{ route('home') }}" class="pure-menu-link">作業管理</a></li>
            @else
            <li class="pure-menu-item pure-menu-has-children pure-menu-allow-hover">
                <a href="{{ route('home') }}" class="pure-menu-link">作業管理</a>
                <ul class="pure-menu-children">
                    <li class="pure-menu-item"><a href="#" class="pure-menu-link">學生頁面</a></li>
                    <li class="pure-menu-item"><a href="#" class="pure-menu-link">作業維護&批改</a></li>
                    <!-- <li class="pure-menu-item"><a href="stdPhoto.php" class="pure-menu-link">系統成員管理</a></li> -->
                    <li class="pure-menu-item"><a href="#" class="pure-menu-link">選擇題管理</a></li>
                </ul>
            </li>
            @endif
            <li class="pure-menu-item"><a href="#" class="pure-menu-link">個人資訊</a></li>
            <li class="pure-menu-item"><a href="{{ route('logout') }}" class="pure-menu-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">登出</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf</form>
            </li>
        @endguest
        </ul>
    </div>
</div>
