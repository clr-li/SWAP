<?php
include('classes/DB.php');
include('./classes/Login.php');
$username = "";
$user = "";

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if (Login::isLoggedIn()) {
    $user_id = Login::isLoggedIn();
    $user = DB::query('SELECT username FROM usertable WHERE id=:user_id', array(':user_id'=>$user_id))[0]['username'];
} 
?>
<title>Account</title>
<link rel="stylesheet" href="styles.css">
<link rel="icon" href="icons/grape.png"/>
<nav class="navbar">
        <div class="navbar__container">
            <a href="/" id="navbar__logo">SWAP</a>
            <div class="navbar__toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <ul class="navbar__menu">
                <li class="navbar__item">
                    <a href="/index.php" class="navbar__links">
                    Home
                    </a>
                </li>
                <li class="navbar__item">
                    <a href="/art.php" class="navbar__links">
                    Art
                    </a>
                </li>
                <li class="navbar__item">
                    <a href="/wurtle.php" class="navbar__links">
                    Wurtle
                    </a>
                </li>
                <li class="navbar__item">
                    <a href="/personalitytest.php" class="navbar__links">
                    P&#8209;Test
                    </a>
                </li>
                <li class="navbar__item">
                    <a href="/search.php" class="navbar__links">
                    Community
                    </a> 
                </li>                
                <li class="navbar__item">
                    <a href="/profile.php?username=<?=$user?>" class="navbar__links">
                    Profile 
                    </a>
                </li>                
                <li class="navbar__btn">
                    <a href="/account.php" class="button">
                    Account
                    </a>
                </li>
            </ul>
        </div>
    </nav>
<div class="container__large">
    <div class="center">
        <input class="button__submit" style="border-bottom: none;" type="button" onclick="location.href='/login.php'" value="Login">
        <input class="button__submit" style="border-bottom: none;" type="button" onclick="location.href='/logout.php'" value="Logout" />
        <input class="button__submit" style="border-bottom: none;" type="button" onclick="location.href='/change-password.php'" value="Change Password" />
        <input class="button__submit" type="button" onclick="location.href='/forgot-password.php'" value="Forgot Password" />
    </div>
</div>
</div>