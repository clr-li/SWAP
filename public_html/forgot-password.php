<?php
include('./classes/DB.php');
include('./classes/Login.php');

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$token = "";
if (Login::isLoggedIn()) {
    $user_id = Login::isLoggedIn();
    $user = DB::query('SELECT username FROM usertable WHERE id=:user_id', array(':user_id'=>$user_id))[0]['username'];
} 

if (isset($_GET['resetpassword'])) {
    $cstrong = True;
    $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
    $email = $_GET['email'];
    $user_id = DB::query('SELECT id FROM usertable WHERE email=:email', array(':email'=>$email))[0][id];
    DB::query('INSERT INTO password_tokens VALUES (0, :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$user_id));
    mail($email, "Reset Password", "Hello! Follow this link to change your password: swap0nline.com/change-password.php?token=".$token, "From: <passwordservice@swap0nline.com>");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SWAP</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="icons/grape.png"/>
</head>
<body>
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
    </nav><div class="div__box" style="height: 210px;"><br>
    <center><h1 style="color:#9c09d1;">Forgot Password</h1></center><br>
    <center><form action="forgot-password.php" method="GET">
            <input class="input__login" type="text" name="email" placeholder="Email" value=""><p /><br>
            <input class="button__submit" type="submit" name="resetpassword" value="Reset Password" value="">
    </form></center>
</div>
    <?php
        $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        if (strpos($fullUrl, "signin=".$token) == true) {
            echo "Password changed!";
        } else if (strpos($fullUrl, "signin=invpass") == true) {
            echo "<p>Invalid password</p>";
        }
    ?>
</body>
</html> 
