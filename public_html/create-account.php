
<?php
include('classes/DB.php');
if (isset($_POST['createaccount'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $first = $_POST['first'];
    $last = $_POST['last'];

    if (!DB::query('SELECT username FROM usertable WHERE username=:username', array(':username'=>$username))) {
        if (strlen($username) >= 3 && strlen($username) <= 32) {
            if (preg_match('/[a-zA-Z0-9_]+/', $username)) {
                if (strlen($password) >= 6 && strlen($password) <= 60) {
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        if (!DB::query('SELECT email FROM usertable WHERE email=:email', array(':email'=>$email))) {
                            
                            if (strlen($first) >= 1 && strlen($first) <= 25) {
                                $conn = mysqli_connect("localhost", "u242050040_root", "Asdfjkl1234", "u242050040_swap");
                                $password = password_hash($password, PASSWORD_BCRYPT);
                                $sql = "INSERT INTO usertable VALUES (0, '$username', '$password', '$email', '0', '$first', '$last', NULL, '0')";
                                if (mysqli_query($conn, $sql)) {
                                      echo "New record created successfully";
                                } else {
                                      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                }
                                mysqli_close($conn);                                
                                header("Location: ../create-account.php?createacc=success");
                            } else {
                                echo 'Please enter first name';
                            }
                        } else {
                            header("Location: ../create-account.php?createacc=usedemail");
                        }
                    } else {
                        header("Location: ../create-account.php?createacc=invemail");
                    }
                } else {
                    header("Location: ../create-account.php?createacc=invpass");
                }
            } else {
                header("Location: ../create-account.php?createacc=invusername");
            }
        } else {
            header("Location: ../create-account.php?createacc=invusername");
        }
    } else {
        header("Location: ../create-account.php?createacc=usedusername");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
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
                    <a href="/profile.php?username=" class="navbar__links">
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
    <div class="div__box" style="height: 370px;">
        <br><center><h1>Create Account</h1><br>
        <form action="create-account.php" method="POST">
            <p>
                <input class="input__login" style="border-bottom: none;" type="text" name="first" placeholder="First Name" id="first"><p />
                <input class="input__login" style="border-bottom: none;" type="text" name="last" placeholder="Last Name" id="last"><p />
                <input class="input__login" style="border-bottom: none;" type="text" name="username" placeholder="Username" id="username"><p />
                <input class="input__login" style="border-bottom: none;" type="password" name="password" placeholder="Password" id="password"><p />
                <input class="input__login" type="email" name="email" placeholder="example@gmail.com" id="email"><p /><br>
                <input class="button__post" style="width: 110px;" type="submit" name="createaccount" value="Create Account" id="btn">
            </p>
        </form></center>
    </div>
    <?php 
        $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        if (strpos($fullUrl, "createacc=usedusername") == true) {
            echo "<p>Username already in use</p>";
            exit();
        } else if (strpos($fullUrl, "createacc=invusername") == true) {
            echo "<p>Invalid username</p>";
            exit();
        } else if (strpos($fullUrl, "createacc=invpass") == true) {
            echo "<p>Invalid password</p>";
            exit();
        } else if (strpos($fullUrl, "createacc=invemail") == true) {
            echo "<p>Invalid email</p>";
            exit();
        } else if (strpos($fullUrl, "createacc=emailused") == true) {
            echo "<p>Email already in use</p>";
            exit();
        } else if (strpos($fullUrl, "createacc=success") == true) {
            echo "<center><p style='color: #9c09d1; font-size: 20px;'>You have been signed up!</p></center>";
        } 
    ?>
</body>
</html> 
