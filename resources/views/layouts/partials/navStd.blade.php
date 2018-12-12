<?php session_start(); ?>
<div class="header">
    <div class="home-menu pure-menu pure-menu-horizontal pure-menu-fixed">
        <a class="pure-menu-heading" href="{{ url('\') }}">學生作業管理系統</a>
        <label style="position: relative; top: 2px; color: white;">
        </label>
        <ul class="pure-menu-list">
            <li class="pure-menu-item pure-menu-allow-hover">
                <a href="student.php" class="pure-menu-link">作業管理</a>
            </li>
            <li class="pure-menu-item  pure-menu-has-children pure-menu-allow-hover">
                <a href="#" class="pure-menu-link">設定</a>
                <ul class="pure-menu-children">
                    <li class="pure-menu-item"><a href="profile.php" class="pure-menu-link">個人資料管理</a></li>
                    <li class="pure-menu-item"><a href="#" class="pure-menu-link">修改密碼</a></li>
                </ul>
            </li>
            <li class="pure-menu-item"><a href="logout.php" class="pure-menu-link">登出</a></li>
        </ul>
    </div>
</div>
