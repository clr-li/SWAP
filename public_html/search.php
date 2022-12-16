<?php
include('./classes/Login.php');
include('./classes/DB.php');
include('./classes/Post.php');
$img_url = "";
$user = "";
$follower_id = Login::isLoggedIn();
$profilepic = "";

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if (Login::isLoggedIn()) {
    $user_id = Login::isLoggedIn();
    $user = DB::query('SELECT username FROM usertable WHERE id=:user_id', array(':user_id'=>$user_id))[0]['username'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Community</title>
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
    <center><br>
        <form action="" method="POST">
            <input type="text" name="username" placeholder="Search Users">
            <input type="submit" name="search" value="Search">
        </form>
        <?php
        include "db_conn.php";
        $conn = mysqli_connect("localhost", "u242050040_root", "Asdfjkl1234");
        $db = mysqli_select_db($conn, "u242050040_swap");

        if (isset($_POST['search'])) {
            $username = $_POST['username'];
            //$first = $_POST['first'];
            $query = "SELECT * FROM usertable ORDER BY (levenshtein(usertable.username,'$username')-LENGTH(usertable.username)/1.0001) ASC LIMIT 5;"; // find the 5 usernames that require the least amount of inserts, swaps, and deletes to match the searched username, includes a correction so shorter names are not prioritized, levenshtein() taken from https://gist.github.com/Kovah/df90d336478a47d869b9683766cff718
            //$query = "SELECT * FROM usertable WHERE username LIKE '%$username%';"; // suggestion: we could combine the two search queries to get more relevant searches
            $query_run = mysqli_query($conn, $query);
            while($row = mysqli_fetch_array($query_run)) {
                $profilepic = DB::query('SELECT profilepic FROM usertable WHERE username=:username', array(':username'=>$row['username']))[0]['profilepic'];            
                ?>
                    <form action="" method="POST">
                        <input class='profilepic' type='image' src='profilepic/<?=$profilepic?>' name='profile' value='profile'>
                        <a style="text-decoration: none;" href="profile.php?username=<?=$row['username']?>">@<?=$row['username']?><a><br>
                        <input type="text" name="name" value="<?php echo $row['first'] ?>"/>
                    </form>
                <?php
            }
        }
        ?>
    </center>
    <div>
        <?php
            // lists 5 users with the most followers
            $query = DB::query('SELECT * FROM usertable ORDER BY followercount DESC LIMIT 5');
            $query_run = mysqli_query($conn, $query);
            while($row = mysqli_fetch_array($query_run)) {
                echo 'test';
                $profilepic = DB::query('SELECT profilepic FROM usertable WHERE username=:username', array(':username'=>$row['username']))[0]['profilepic'];            
            }?>
            
    </div>
</body>
</html>