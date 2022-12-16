<?php
include('./classes/DB.php');
include('./classes/Login.php');
include('./classes/Post.php');
include('./classes/Comment.php');
date_default_timezone_set('America/Los_Angeles');
// echo date("H:i:s", time());
if (isset($_POST['ie'])) {
    // $freetime =$_POST['freetime'];
    // $GoogleDrive =$_POST['GoogleDrive'];
    // $chair =$_POST['chair']; 
    // $airplane =$_POST['airplane'];
    // $text =$_POST['text'];
    // $funnytext =$_POST['funnytext'];
    // $drugs =$_POST['drugs'];
    // $homework =$_POST['homework'];
    // $movies =$_POST['movies'];
    // $bump =$_POST['bump'];
    // $cookie =$_POST['cookie'];
    // $party =$_POST['party'];
    // $laugh =$_POST['laugh'];
    // $chess =$_POST['chess'];
    $questions = $_POST['questions'];
    $ie = $_POST['ie'];
    $ns = $_POST['ns'];
    $tf = $_POST['tf'];
    $jp = $_POST['jp'];
    $w = $_POST['w'];
    $type = $_POST['type'];
    $feedback = $_POST['feedback'];
    $name = $_POST['name'];
    $date = date("Y-m-d H:i:s", time());
    
    if (Login::isLoggedIn()) {
        $user_id = Login::isLoggedIn();
        $username = DB::query('SELECT username FROM usertable WHERE id=:user_id', array(':user_id'=>$user_id))[0]['username'];
    } else {
        $username = NULL;
    }
    $conn = mysqli_connect("localhost", "u242050040_root", "Asdfjkl1234", "u242050040_swap");
    $sql = "INSERT INTO p_test VALUES (0, '$name', '$username', '$ie', '$ns', '$tf', '$jp', '$date', '$questions', '$w','$type', '$feedback')";
    // $sql = "INSERT INTO p_test VALUES (0, '$username', '4', '4', '4', '4', 'date(\"Y-m-d H:i:s\")', '4', '4')";
    if (mysqli_query($conn, $sql)) {
          echo "New record created successfully";
    } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SWAP</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="trash.png">
    <link rel="icon" href="icons/grape.png"/>
    
    <!--Experiment with ads-->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2506386356413129"
     crossorigin="anonymous"></script>
     
         <link rel="stylesheet/less" type="text/css" href="wurtleGraphics/style.less" />
    <script src="https://cdn.jsdelivr.net/npm/less@4.1.1" ></script>
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
                    <! ––<?php echo "/index.php?" . (String) rand(0,100000)?>-->
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
    
    <!--Annoying Cookie Popup-->
    <div class="cookie-consent" id="popup">
        <span>This site uses cookies for user authen-tication and removing this popup 🍪</span>
        <button class="allow-button" onclick="remove()">Allow cookies</button>
    </div>
    <script>
        function remove() {
            document.getElementById('popup').style.display = "none";
            setCookie('cookiePopup', 'agree', 7);
        }
        function setCookie(cname, cvalue, exdays) {
          const d = new Date();
          d.setTime(d.getTime() + (exdays*24*60*60*1000));
          let expires = "expires="+ d.toUTCString();
          document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        }
        function getCookie(cname) {
          let name = cname + "=";
          let decodedCookie = decodeURIComponent(document.cookie);
          let ca = decodedCookie.split(';');
          for(let i = 0; i <ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
              c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
              return c.substring(name.length, c.length);
            }
          }
          return "";
        }
        if (getCookie('cookiePopup') == 'agree') {
            remove();
        }
    </script>
    
    <div class="background">
        <div id="bubble-field"></div>
        <div class="fish">
            <div class="top-fin"></div>
            <div class="fish-body"></div>
            <div class="tail-fin"></div>
            <div class="side-fin"></div>
            <div class="scale scale-1"></div>
            <div class="scale scale-2"></div>
            <div class="scale scale-3"></div>
        </div>  
        <div class="fish blue-fish">
            <div class="top-fin"></div>
            <div class="fish-body"></div>
            <div class="tail-fin"></div>
            <div class="side-fin"></div>
            <div class="scale scale-1"></div>
            <div class="scale scale-2"></div>
            <div class="scale scale-3"></div>
        </div>
        
        <div class="position">
            <main class="turtle">  
                <div class="turtle__head"></div>
                <div class="turtle__legs -left"></div>
                <div class="turtle__legs -right"></div>
                <div class="turtle__tail"></div>
                
                <section class="turtle__shell">
                    <div></div>
                </section>
            </main>
        </div>
        <script src="wurtleGraphics/sketch.js"></script>
    </div>
    
    <!--<form action="personalitytest.php" method="POST">-->
        <div id="freetime" class="question">
        <h1>How much free time do you have right now?</h1>
        <label class="form-control"><input type="radio" name="freetime" value="0_-1_0_3" onclick="setRandomQuestions(10+1)"> Enough for 10 questions tops. Just taking this for fun. Not looking for an exact result</label>
        <label class="form-control"><input type="radio" name="freetime" value="0_1_0_-2" onclick="setRandomQuestions(20+1)"> Enough for a medium length test. 20 questions</label>
        <label class="form-control"><input type="radio" name="freetime" value="0_-1_0_-3" onclick="setBoredQuestions()"> I'm bored. Give me more. At least 35 questions please</label>
        <label class="form-control"><input type="radio" name="freetime" value="0_-1_0_-4_1" onclick="setUnemployedQuestions()"> Unemployed o'clock. I'm prepared to be here for a while</label>
        <label class="form-control"><input type="radio" name="freetime" value="0_-1_-1_0" onclick="setRandomQuestions(1)"> Nope, I'm good</label><br>
        </div>
        
        <!--<h1>How do you participate in seminars?</h1>-->
        <!--<label class="form-control"><input type="radio" name="chess" value="1_1_0_0"> Say whatever I need to get a good grade, then sit quietly for the rest of the time</label>-->
        <!--<label class="form-control"><input type="radio" name="chess" value="3_0_0_0"> Don't say anything, equip my invisibility cloak</label>-->
        <!--<label class="form-control"><input type="radio" name="chess" value="1_2_0_0"> Treat it like a casual conversation. Speak when I feel like it</label><br>-->
        
        <div id="vacation" class="question">
        <h1>What's your dream vacation?</h1>
        <label class="form-control"><input type="radio" name="vacation" value="-1_-1_1_1"> New York with the friends</label>
        <label class="form-control"><input type="radio" name="vacation" value="-4_2_-3_-2_1"> Party in Las Vegas with the nice ladies</label>
        <label class="form-control"><input type="radio" name="vacation" value="-1_3_-2_-1"> Running away from drop bears in Australia</label>
        <label class="form-control"><input type="radio" name="vacation" value="-1_3_2_3"> Touring Europe for the culture</label>
        <label class="form-control"><input type="radio" name="vacation" value="0_2_0_2"> Japan but permanently</label>
        <label class="form-control"><input type="radio" name="vacation" value="1_-1_0_-1"> Camping/fishing/anything outdoorsy with family</label>
        <label class="form-control"><input type="radio" name="vacation" value="-1_1_0_0"> Let's go to the beach-each let's go get a wave &#9834;</label>
        <label class="form-control"><input type="radio" name="vacation" value="4_-4_0_-2"> At home, doing nothing</label><br>
        </div>
        
        <div id="mod" class="question">
        <h1>What do you put on your mod pizza?</h1>
        <label class="form-control"><input type="radio" name="mod" value="0_0_0_0_1"> I don't like pizza</label>
        <label class="form-control"><input type="radio" name="mod" value="1_-3_1_0"> Just cheese</label>
        <label class="form-control"><input type="radio" name="mod" value="0_-2_0_0"> 1-6 toppings</label>
        <label class="form-control"><input type="radio" name="mod" value="0_-1_0_0"> 7-14 toppings</label>
        <label class="form-control"><input type="radio" name="mod" value="0_1_0_0"> 15-25 toppings</label>
        <label class="form-control"><input type="radio" name="mod" value="0_3_0_0"> Everything except one or two toppings</label>
        <label class="form-control"><input type="radio" name="mod" value="0_-3_0_0"> I get the salad</label>
        <label class="form-control"><input type="radio" name="mod" value="-2_2_0_1"> My order is too complicated to be on a p-test</label><br>
        </div>
        
        <div id="GoogleDrive" class="question">
        <h1>How do you organize your Google Drive?</h1>
        <label class="form-control"><input type="radio" name="GoogleDrive" value="0_1_1_4"> Carefully organized. What am I? A savage???</label>
        <label class="form-control"><input type="radio" name="GoogleDrive" value="0_-1_0_-4"> Dump everything into one folder</label>
        <label class="form-control"><input type="radio" name="GoogleDrive" value="0_0_0_-2"> I try to organize, but I still can't find anything</label>
        <label class="form-control"><input type="radio" name="GoogleDrive" value="0_0_0_-1"> I have too many Google accounts to keep track of</label>
        <label class="form-control"><input type="radio" name="GoogleDrive" value="0_0_0_0_2"> I don't use Google Drive</label><br>
        </div>
        
        <div id="exam" class="question">
        <h1>How do you prepare for finals?</h1>
        <label class="form-control"><input type="radio" name="exam" value="0_0_0_-4"> I don't cuz Cs get degrees</label>
        <label class="form-control"><input type="radio" name="exam" value="0_1_0_-1"> Pretend I'm sick to get an extension</label>
        <label class="form-control"><input type="radio" name="exam" value="0_0_0_5"> I start studying as soon as I hear about it and make a detailed plan</label>
        <label class="form-control"><input type="radio" name="exam" value="0_0_0_-1"> Cram study the day before with review videos and snacks</label>
        <label class="form-control"><input type="radio" name="exam" value="0_0_0_3"> Review notes and homework the week before</label><br>    
        </div>
        
        <div id="minecraft" class="question">
        <h1>How did you play Minecraft?</h1>
        <label class="form-control"><input type="radio" name="minecraft" value="0_0_0_0_1"> I never played</label>
        <label class="form-control"><input type="radio" name="minecraft" value="1_-1_0_0"> Singleplayer survival. It's the way it's meant to be played</label>
        <label class="form-control"><input type="radio" name="minecraft" value="3_-2_0_0"> Speedrunning</label>
        <label class="form-control"><input type="radio" name="minecraft" value="-1_1_0_0"> Hypixel and other cool servers</label>
        <label class="form-control"><input type="radio" name="minecraft" value="2_-1_0_0"> I didn't. I just watched others play</label>
        <label class="form-control"><input type="radio" name="minecraft" value="1_2_0_0"> I hung out in creative mode</label>
        <label class="form-control"><input type="radio" name="minecraft" value="3_2_2_0"> Redstone. Calculators, and more!</label>
        <label class="form-control"><input type="radio" name="minecraft" value="1_0_0_0"> I still play</label><br>
        </div>
        
        <div id="chair" class="question">
        <h1>How do you rock your chair?</h1>
        <label class="form-control"><input type="radio" name="chair" value="2_-2_1_1"> I don't rock my chair</label>
        <label class="form-control"><input type="radio" name="chair" value="-3_2_0_0_2"> I rock vigorously. I'll even rock until I fall</label>
        <label class="form-control"><input type="radio" name="chair" value="0_0_0_0"> Gently</label><br>    
        </div>
        
        <div id="trolley" class="question">
        <h1>Trolley question: 5 people are about to die. You can save them by diverting the trolley to kill one person</h1>
        <label class="form-control"><input type="radio" name="trolley" value="0_0_3_0_1"> D1v3rt the tr0113y. I think of lives as numbers. 5 > 1</label>
        <label class="form-control"><input type="radio" name="trolley" value="0_0_-1_0"> Divert the trolley. All people are equal. I'd rather save 4 lives</label>
        <label class="form-control"><input type="radio" name="trolley" value="0_0_1_0"> Let the 5 people die naturally. I'm not a god, I shouldn't chose who gets to live</label>
        <label class="form-control"><input type="radio" name="trolley" value="0_0_-3_0"> Let the 5 people die. I'd rather be a bystander than a murderer</label><br>    
        </div>
        
        <div id="airplane" class="question">
        <h1>If you see a paper airplane fly by in class, how do you react?</h1>
        <label class="form-control"><input type="radio" name="airplane" value="1_-1_1_0"> Annoyed</label>
        <label class="form-control"><input type="radio" name="airplane" value="-2_1_-1_-1"> Join in on the fun</label>
        <label class="form-control"><input type="radio" name="airplane" value="2_0_-1_0_1"> Block them on Facebook</label>
        <label class="form-control"><input type="radio" name="airplane" value="0_0_3_0"> Analyze the quality of the plane</label>
        <label class="form-control"><input type="radio" name="airplane" value="2_0_0_0"> Sit quietly and ignore the situation</label><br>            
        </div>
        
        <div id="text" class="question">
        <h1>What texting style do you use?</h1>
        <label class="form-control"><input type="radio" name="text" value="1_-1_1_1"> Short</label>
        <label class="form-control"><input type="radio" name="text" value="0_0_-2_0"> I write very long texts. I simply can't help my need to elaborate; what if people misunderstand me!</label>
        <label class="form-control"><input type="radio" name="text" value="-1_0_0_0"> Bunch<br>of<br>short<br>texts</label>
        <label class="form-control"><input type="radio" name="text" value="0_-1_1_1_1"> To whom it may concern, I converse in formal email style. Sincerely, Yours Truly</label>
        <label class="form-control"><input type="radio" name="text" value="-1_0_0_0"> Lol, lmao, XD</label>
        <label class="form-control"><input type="radio" name="text" value="-1_0_-2_0"> I'mmm veryyyy friendlyyyyy</label><br>    
        </div>
        
        <div id="funnytext" class="question">
        <h1>How do you respond to a funny text?</h1>
        <label class="form-control"><input type="radio" name="funnytext" value="1_-1_0_0"> haha, lol, or emoji. Simple option is best</label>
        <label class="form-control"><input type="radio" name="funnytext" value="4_-2_0_1_1"> Ignore. I don't have the energy to socialize after hours</label>
        <label class="form-control"><input type="radio" name="funnytext" value="-2_0_-1_0"> LMFAO</label>
        <label class="form-control"><input type="radio" name="funnytext" value="-3_2_0_1"> Say something funny back. I like to put in effort into my texts</label><br>
        <!--<label class="form-control"><input type="radio" name="funnytext" value="___"> That's funny. It's just funny</label><br>-->    
        </div>

        <div id="drugs" class="question">
        <h1>If you find out your best friend is doing heroin, how do you respond?</h1>
        <label class="form-control"><input type="radio" name="drugs" value="3_-1_0_-1_2"> Wait five years, hope the problem fixes itself</label>
        <label class="form-control"><input type="radio" name="drugs" value="-4_-1_2_3"> Call the police</label>
        <label class="form-control"><input type="radio" name="drugs" value="0_0_1_2"> Talk to an authority figure</label>
        <label class="form-control"><input type="radio" name="drugs" value="0_0_-3_0"> Have a chat with them</label>
        <label class="form-control"><input type="radio" name="drugs" value="-5_4_0_-2_3"> Suggest a better drug, then join them</label>
        <label class="form-control"><input type="radio" name="drugs" value="4_-1_0_-1_2"> Ignore the situation</label><br>
        <!--<label class="form-control"><input type="radio" name="drugs" value="____"> Unfollow them on Instagram</label><br>-->            
        </div>
        
        <div id="homework" class="question">
        <h1>What do you do if you are stumped on math homework?</h1>
        <label class="form-control"><input type="radio" name="homework" value="0_-1_-2_0"> Give up and go to bed</label>
        <label class="form-control"><input type="radio" name="homework" value="1_-1_2_1"> Google the answer</label>
        <label class="form-control"><input type="radio" name="homework" value="0_0_1_0"> Ask a friend</label>
        <label class="form-control"><input type="radio" name="homework" value="2_-1_0_2_1"> Read the entire textbook</label>
        <label class="form-control"><input type="radio" name="homework" value="-3_1_0_0_2"> Call the teacher at midnight</label><br>    
        </div>
        
        <div id="movies" class="question">
        <h1>How do you watch your movies?</h1>
        <label class="form-control"><input type="radio" name="movies" value="0_0_0_0_1"> I just watch the movie</label>
        <label class="form-control"><input type="radio" name="movies" value="1_0_0_0"> At 2x speed</label>
        <label class="form-control"><input type="radio" name="movies" value="1_1_0_-2_1"> Download extensions to watch at 4x speed</label>
        <label class="form-control"><input type="radio" name="movies" value="0_-1_1_0"> Fall asleep halfway through the movie, wake up, then ask "what's happening?"</label>
        <label class="form-control"><input type="radio" name="movies" value="-2_1_-2_0"> Text people while watching the movie</label>
        <label class="form-control"><input type="radio" name="movies" value="2_2_0_0_1"> Skip through half the movie</label>
        <label class="form-control"><input type="radio" name="movies" value="-1_1_0_0"> Search up the ending and spoil it for everyone else</label>
        <label class="form-control"><input type="radio" name="movies" value="-3_0_1_0"> Analyze the movie with friends</label><br>    
        </div>
        
        <div id="bump" class="question">
        <h1>What do you do when you're about to bump into someone?</h1>
        <label class="form-control"><input type="radio" name="bump" value="2_-1_-2_1"> Cry</label>
        <label class="form-control"><input type="radio" name="bump" value="-3_0_0_0"> Bulldoze them</label>
        <label class="form-control"><input type="radio" name="bump" value="-3_2_-1_-1_1"> Go in for the hug</label>
        <label class="form-control"><input type="radio" name="bump" value="0_0_0_2"> Prepare for the apology</label>
        <label class="form-control"><input type="radio" name="bump" value="3_0_0_0"> Ignore the situation</label><br>    
        </div>
        
        <div id="cookie" class="question">
        <h1>What do you do when you're caught with a cookie?</h1>
        <label class="form-control"><input type="radio" name="cookie" value="-2_1_-1_-1"> Eat it then run away</label>
        <label class="form-control"><input type="radio" name="cookie" value="-1_1_0_-1"> Run away then eat it</label>
        <label class="form-control"><input type="radio" name="cookie" value="2_-1_-2_0"> Put it back and apologize</label>
        <label class="form-control"><input type="radio" name="cookie" value="1_0_0_0"> Eat it and apologize</label>
        <label class="form-control"><input type="radio" name="cookie" value="-2_2_2_1"> Offer to split the cookie</label>
        <label class="form-control"><input type="radio" name="cookie" value="-1_1_0_1_1"> Blame your sibling/friend</label><br>    
        </div>
        
        <div id="party" class="question">
        <h1>At a party what do you do?</h1>
        <label class="form-control"><input type="radio" name="party" value="3_-1_0_0"> Hang out with the food</label>
        <label class="form-control"><input type="radio" name="party" value="0_1_-1_0"> Hang out with your friends</label>
        <label class="form-control"><input type="radio" name="party" value="4_-1_-1_0"> Hide in the bathroom</label>
        <label class="form-control"><input type="radio" name="party" value="-4_2_-1_0"> Karaoke/dance in front of everyone!</label><br>    
        </div>
        
        <div id="afterparty" class="question">
        <h1>After the party what do you do?</h1>
        <label class="form-control"><input type="radio" name="afterparty" value="2_-1_2_1"> Go home and sleep</label>
        <label class="form-control"><input type="radio" name="afterparty" value="2_-1_0_0"> I just watch Youtube</label>
        <label class="form-control"><input type="radio" name="afterparty" value="0_1_-1_-1_100"> Drunk drive</label>
        <label class="form-control"><input type="radio" name="afterparty" value="-4_3_-1_-1"> Go to the afterparty at a friend's house</label>
        <label class="form-control"><input type="radio" name="afterparty" value="-1_1_-1_0"> Eat at another restaurant. Dancing makes me hungry</label>
        <label class="form-control"><input type="radio" name="afterparty" value="0_0_2_-1"> Finish my hw thats due tomorrow because I didn't do it ahead of time</label><br>    
        </div>
        
        <div id="tetris" class="question">
        <h1>You've just programmed a cool <a href="https://alextetris.glitch.me/">tetris</a> game what do you do?</h1>
        <label class="form-control"><input type="radio" name="tetris" value="0_0_2_1"> Monitize it</label>
        <label class="form-control"><input type="radio" name="tetris" value="-1_0_-1_0"> Show it to my friend(s)</label>
        <label class="form-control"><input type="radio" name="tetris" value="-3_2_-2_0"> Show it to everyone</label>
        <label class="form-control"><input type="radio" name="tetris" value="3_-1_0_0"> Keep it to myself</label>
        <label class="form-control"><input type="radio" name="tetris" value="0_0_0_0_1"> Hang it up on the fridge</label><br>            
        </div>
        
        <div id="laugh" class="question">
        <h1>When people laugh what is your first thought?</h1>
        <label class="form-control"><input type="radio" name="laugh" value="2_0_-1_1"> They're laughing at me</label>
        <label class="form-control"><input type="radio" name="laugh" value="-2_0_0_-1"> They're laughing with me</label>
        <label class="form-control"><input type="radio" name="laugh" value="5_0_-3_0_1"> I don't know. I just cry because loud people scare me :(</label>
        <label class="form-control"><input type="radio" name="laugh" value="-4_1_-1_-1"> Doesn't matter. I'll laugh louder and join in on the fun!</label><br>            
        </div>
        
        <div id="chess" class="question">
        <h1>Is chess a sport?</h1>
        <label class="form-control"><input type="radio" name="chess" value="1_1_0_0"> Yes because it is competitive</label>
        <label class="form-control"><input type="radio" name="chess" value="-1_-1_0_0"> No because they sit and stare and don't even break a sweat</label>
        <label class="form-control"><input type="radio" name="chess" value="1_2_0_0_1"> No because it is a video game. Haven't you ever watched a chess lets play?</label>
        <label class="form-control"><input type="radio" name="chess" value="2_1_0_0_1"> Yes because it is a video game. Haven't you ever watched a chess lets play?</label><br>            
        </div>
        
        <div id="color" class="question">
        <h1>What's your favorite color?</h1>
        <label class="form-control"><input type="radio" name="color" value="0_0_0_0"> Red</label>
        <label class="form-control"><input type="radio" name="color" value="0_0_0_0"> Blue</label>
        <label class="form-control"><input type="radio" name="color" value="0_0_0_0"> Burgundy</label>
        <label class="form-control"><input type="radio" name="color" value="0_0_0_0_1"> Orange</label>
        <label class="form-control"><input type="radio" name="color" value="0_0_0_0"> White</label>
        <label class="form-control"><input type="radio" name="color" value="0_0_0_0"> Black</label>
        <label class="form-control"><input type="radio" name="color" value="0_0_0_0"> Yellow</label>
        <label class="form-control"><input type="radio" name="color" value="0_0_0_0"> Brown</label>
        <label class="form-control"><input type="radio" name="color" value="0_0_0_0"> Green</label>
        <label class="form-control"><input type="radio" name="color" value="0_0_0_0"> Indigo</label>
        <label class="form-control"><input type="radio" name="color" value="0_0_0_0"> Violet</label>
        <label class="form-control"><input type="radio" name="color" value="0_0_0_0"> Cyan</label>
        <label class="form-control"><input type="radio" name="color" value="0_0_0_0"> Rainbow</label> 
        <label class="form-control"><input type="radio" name="color" value="0_0_0_0"> Other</label><br>
        </div>
        
        <div id="astrology" class="question">
        <h1>What's your astrology sign?</h1>
        <label class="form-control"><input type="radio" name="astrology" value="0_0_0_0"> Aries</label>
        <label class="form-control"><input type="radio" name="astrology" value="0_0_0_0"> Taurus</label>
        <label class="form-control"><input type="radio" name="astrology" value="0_0_0_0"> Gemini</label>
        <label class="form-control"><input type="radio" name="astrology" value="0_0_0_0"> Cancer</label>
        <label class="form-control"><input type="radio" name="astrology" value="0_0_0_0"> Leo</label>
        <label class="form-control"><input type="radio" name="astrology" value="0_0_0_0"> Virgo</label>
        <label class="form-control"><input type="radio" name="astrology" value="0_0_0_0"> Libra</label>
        <label class="form-control"><input type="radio" name="astrology" value="0_0_0_0"> Scorpio</label>
        <label class="form-control"><input type="radio" name="astrology" value="0_0_0_0"> Sagittarius</label>
        <label class="form-control"><input type="radio" name="astrology" value="0_0_0_0"> Capricorn</label>
        <label class="form-control"><input type="radio" name="astrology" value="0_0_0_0"> Aquarius</label>
        <label class="form-control"><input type="radio" name="astrology" value="0_0_0_0"> Pisces</label><br>
        </div>
        
        <div id="bird" class="question">
        <h1>Which of the following is most closely related to birds?</h1>
        <label class="form-control"><input type="radio" name="bird" value="0_0_0_0"> Lizard</label>
        <label class="form-control"><input type="radio" name="bird" value="0_0_0_0"> Crocodile</label>
        <label class="form-control"><input type="radio" name="bird" value="0_0_0_0"> Fish</label>
        <label class="form-control"><input type="radio" name="bird" value="0_0_0_0"> Turtle</label><br>
        </div>
        
        <div id="sport" class="question">
        <h1>What's the best sport?</h1>
        <label class="form-control"><input type="radio" name="sport" value="0_0_0_0"> Ice yachting</label>
        <label class="form-control"><input type="radio" name="sport" value="0_0_0_0"> Underwater rugby</label>
        <label class="form-control"><input type="radio" name="sport" value="0_0_0_0"> One-foot high kick</label>
        <label class="form-control"><input type="radio" name="sport" value="0_0_0_0"> Chess</label>
        <label class="form-control"><input type="radio" name="sport" value="0_0_0_0"> Pickleball</label><br>
        </div>
        
        <div id="cereal" class="question">
        <h1>Do you pour the milk or the cereal first?</h1>
        <label class="form-control"><input type="radio" name="cereal" value="0_0_0_0"> Milk</label>
        <label class="form-control"><input type="radio" name="cereal" value="0_0_0_0"> Cereal</label>
        <label class="form-control"><input type="radio" name="cereal" value="0_0_0_0"> I alternate</label>
        <label class="form-control"><input type="radio" name="cereal" value="0_0_0_0"> I don't eat cereal</label>
        <label class="form-control"><input type="radio" name="cereal" value="0_0_0_0"> I'm a cereal killer</label><br>
        </div>
        
        <div id="phone" class="question">
        <h1>What's the best phone?</h1>
        <label class="form-control"><input type="radio" name="phone" value="0_0_0_0"> iPhone</label>
        <label class="form-control"><input type="radio" name="phone" value="0_0_0_0"> Android</label>
        <label class="form-control"><input type="radio" name="phone" value="0_0_0_0"> Windows</label>
        <label class="form-control"><input type="radio" name="phone" value="0_0_0_0"> Banana</label>
        <label class="form-control"><input type="radio" name="phone" value="0_0_0_0"> Nokia</label><br>
        </div>
        
        <div id="museum" class="question">
        <h1>What do you look for at art museums?</h1>
        <label class="form-control"><input type="radio" name="museum" value="0_0_0_0"> Modern art</label>
        <label class="form-control"><input type="radio" name="museum" value="0_0_0_0"> Sculptures</label>
        <label class="form-control"><input type="radio" name="museum" value="0_0_0_0"> Gift shop</label>
        <label class="form-control"><input type="radio" name="museum" value="0_0_0_0"> Paintings</label>
        <label class="form-control"><input type="radio" name="museum" value="0_0_0_0"> Cafe with free WiFi</label>
        <label class="form-control"><input type="radio" name="museum" value="0_0_0_0"> Photographs</label>
        <label class="form-control"><input type="radio" name="museum" value="0_0_0_0"> Artifacts</label><br>
        </div>
        
        <div id="weather" class="question">
        <h1>What's the weather like right now?</h1>
        <label class="form-control"><input type="radio" name="weather" value="0_0_0_0"> Cloudy with a chance of meatballs</label>
        <label class="form-control"><input type="radio" name="weather" value="0_0_0_0"> Raining squirrels and mammoths</label>
        <label class="form-control"><input type="radio" name="weather" value="0_0_0_0"> It's always sunny</label>
        <label class="form-control"><input type="radio" name="weather" value="0_0_0_0"> Do you wanna build a snowman?</label>
        <label class="form-control"><input type="radio" name="weather" value="0_0_0_0"> Hail Hail go away</label><br>
        </div>
        
        <div id="age" class="question">
        <h1>How old are you?</h1>
        <label class="form-control"><input type="radio" name="age" value="0_0_0_0"> 0-12</label>
        <label class="form-control"><input type="radio" name="age" value="0_0_0_0"> 13-18</label>
        <label class="form-control"><input type="radio" name="age" value="0_0_0_0"> 19-24</label>
        <label class="form-control"><input type="radio" name="age" value="0_0_0_0"> 25-40</label>
        <label class="form-control"><input type="radio" name="age" value="0_0_0_0"> 41-999+</label><br>
        </div>
        
        <div id="friends" class="question">
        <h1>How many friends do you have?</h1>
        <label class="form-control"><input type="radio" name="friends" value="0_0_0_0"> 0-2</label>
        <label class="form-control"><input type="radio" name="friends" value="0_0_0_0"> 3-8</label>
        <label class="form-control"><input type="radio" name="friends" value="0_0_0_0"> 9-15</label>
        <label class="form-control"><input type="radio" name="friends" value="0_0_0_0"> 16-32</label>
        <label class="form-control"><input type="radio" name="friends" value="0_0_0_0"> 33-999+</label><br>
        </div>
        
        <div id="specialfriend" class="question">
        <h1>How many partners do you currently have?</h1>
        <label class="form-control"><input type="radio" name="specialfriend" value="0_0_0_0"> 0</label>
        <label class="form-control"><input type="radio" name="specialfriend" value="0_0_0_0"> 1</label>
        <label class="form-control"><input type="radio" name="specialfriend" value="0_0_0_0"> 2-3</label>
        <label class="form-control"><input type="radio" name="specialfriend" value="0_0_0_0"> 4+</label><br>
        </div>
        
        <div id="Earth" class="question">
        <h1>What shape is the Earth?</h1>
        <label class="form-control"><input type="radio" name="Earth" value="0_0_0_0"> Round</label>
        <label class="form-control"><input type="radio" name="Earth" value="0_0_0_0"> Flat</label>
        <label class="form-control"><input type="radio" name="Earth" value="0_0_0_0"> Other</label><br>
        </div>
        
        <div id="pen" class="question">
        <h1>Would you rather write with a pen or pencil?</h1>
        <label class="form-control"><input type="radio" name="pen" value="0_0_0_0"> Pen</label>
        <label class="form-control"><input type="radio" name="pen" value="0_0_0_0"> Pencil</label>
        <label class="form-control"><input type="radio" name="pen" value="0_0_0_0"> Other</label><br>
        </div>
        
        <div id="colour" class="question">
        <h1>What's your favorite colour?</h1>
        <label class="form-control"><input type="radio" name="colour" value="0_0_0_0"> Read</label>
        <label class="form-control"><input type="radio" name="colour" value="0_0_0_0"> Bluoe</label>
        <label class="form-control"><input type="radio" name="colour" value="0_0_0_0"> Brrrrgundy</label>
        <label class="form-control"><input type="radio" name="colour" value="0_0_0_0_1"> Ohrange</label>
        <label class="form-control"><input type="radio" name="colour" value="0_0_0_0"> Whitte</label>
        <label class="form-control"><input type="radio" name="colour" value="0_0_0_0"> Blaque</label>
        <label class="form-control"><input type="radio" name="colour" value="0_0_0_0"> Yelllow</label>
        <label class="form-control"><input type="radio" name="colour" value="0_0_0_0"> Brouwn</label>
        <label class="form-control"><input type="radio" name="colour" value="0_0_0_0"> Ghreen</label>
        <label class="form-control"><input type="radio" name="colour" value="0_0_0_0"> Indigoh</label>
        <label class="form-control"><input type="radio" name="colour" value="0_0_0_0"> Viollet</label>
        <label class="form-control"><input type="radio" name="colour" value="0_0_0_0"> Scyan</label>
        <label class="form-control"><input type="radio" name="colour" value="0_0_0_0"> Raiynbow</label> 
        <label class="form-control"><input type="radio" name="colour" value="0_0_0_0"> Otther</label><br>
        </div>

        <div id="feedback"  class="question">
            <br><br><br>
            <h1 style="font-size: 3em">Feedback</h1>
            <h1>What's your name?</h1>
            <input type="text" id="name" value="Harry Potter" style="width: 50ch; height: 2em;" maxlength="50"><br><br>
            <h1>If you know your Myers Briggs personality type, what is it?</h1>
            <label class="form-control"><input type="radio" name="p-type" value="IDFK" checked> IDFK</label>
            <label class="form-control"><input type="radio" name="p-type" value="INTJ"> INTJ</label>
            <label class="form-control"><input type="radio" name="p-type" value="INTP"> INTP</label>
            <label class="form-control"><input type="radio" name="p-type" value="INFJ"> INFJ</label>
            <label class="form-control"><input type="radio" name="p-type" value="INFP"> INFP</label>
            <label class="form-control"><input type="radio" name="p-type" value="ISTJ"> ISTJ</label>
            <label class="form-control"><input type="radio" name="p-type" value="ISTP"> ISTP</label>
            <label class="form-control"><input type="radio" name="p-type" value="ISFJ"> ISFJ</label>
            <label class="form-control"><input type="radio" name="p-type" value="ISFP"> ISFP</label>
            <label class="form-control"><input type="radio" name="p-type" value="ENTJ"> ENTJ</label>
            <label class="form-control"><input type="radio" name="p-type" value="ENTP"> ENTP</label>
            <label class="form-control"><input type="radio" name="p-type" value="ENFJ"> ENFJ</label>
            <label class="form-control"><input type="radio" name="p-type" value="ENFP"> ENFP</label>
            <label class="form-control"><input type="radio" name="p-type" value="ESTJ"> ESTJ</label>
            <label class="form-control"><input type="radio" name="p-type" value="ESTP"> ESTP</label>
            <label class="form-control"><input type="radio" name="p-type" value="ESFJ"> ESFJ</label>
            <label class="form-control"><input type="radio" name="p-type" value="ESFP"> ESFP</label>
            
            <h1 style="padding-top:1rem;">Any other feedback/suggestions?</h1>
            <input type="text" id="comment" value="Tetris question is stupid" style="width: 80%; height: 6em;" maxlength="300"><br><br>
            
            <button onclick="submit()" id="sub" name="testSubmit">SUBMIT</button>    
        </div>
    <!--</form>-->
    <script>
        function getSelectedAnswer(questionName) {
            let options = document.getElementsByName(questionName);
            
            for (let i = 0; i < options.length; i++) {
                if (options[i].checked) {
                    return options[i].value;
                }
            }
            
            return false;
        }
        function getSelectedAnswerText(questionName) {
            let options = document.getElementsByName(questionName);
            
            for (let i = 0; i < options.length; i++) {
                if (options[i].checked) {
                    let n = options[i].parentElement.innerHTML;
                    return n.slice(n.indexOf('>')+2).replace(/\W/g, '');
                }
            }
            
            return "false";
        }
        let questionsFull = ["freetime","vacation","mod","GoogleDrive","exam","minecraft","chair","trolley","airplane","text","funnytext","drugs","homework","movies","bump","cookie","party","afterparty","tetris","laugh","chess"];
        let weirdQuestions = ["color","astrology","bird","sport","cereal","phone","museum","weather","age","friends","specialfriend","Earth","colour", "pen"];
        let questions = questionsFull.concat(weirdQuestions);
        questions.forEach((q) => {
            document.getElementById(q).style.display = "None";
            if (q != "freetime") document.getElementById(q).innerHTML += '<label class="form-control"><input type="radio" name="'+q+'" value="0_0_0_0"> Nope, I\'m good</label><br>';
            document.getElementById(q).innerHTML += '<button onclick="next()">NEXT</button>';
        });
        document.getElementById("feedback").style.display = "None";
        document.getElementById(questions[0]).style.display = "block";
        let ix = 0;
        function next() {
            if (ix >= questions.length - 1) {
                document.getElementById(questions[ix]).style.display = "None";
                document.getElementById("feedback").style.display = "block";
                return;
            }
            if (getSelectedAnswer(questions[ix])) {
                document.getElementById(questions[ix]).style.display = "None";
                document.getElementById(questions[++ix]).style.display = "block";
            } else {
                alert("Please select an answer before continuing");
            }
        }
        function setRandomQuestions(count) {
            // Shuffle array
            const shuffled = questionsFull.slice(1, questionsFull.length).sort(() => 0.5 - Math.random());
            // Get sub-array of first n elements after shuffled
            questions = ["freetime"].concat(shuffled).slice(0, count);
        }
        function setBoredQuestions() {
            questions = questionsFull.concat(weirdQuestions);
        }
        function setUnemployedQuestions() {
            questions = questionsFull.concat(weirdQuestions).concat(questionsFull.concat(weirdQuestions));
        }
        function submit() {
            document.getElementById("sub").disabled = true;
            let IE = 0;
            let NS = 0;
            let TF = 0;
            let JP = 0;
            let W = 0;
            let TYPE = "";
            let explanation = "You are ";
            for (let i = 0; i < questions.length; i++) {
                let answer = getSelectedAnswer(questions[i]);
                answer = answer.split('_');
                IE += parseInt(answer[0]);
                NS += parseInt(answer[1]);
                TF += parseInt(answer[2]);
                JP += parseInt(answer[3]);
                if (answer.length > 4) {
                    W += parseInt(answer[4]);
                }
            }
            if (IE >= 0) {
                TYPE += "I";
                explanation += "introverted. ";
            } else {
                TYPE += "E";
                explanation += "extroverted. ";
            }
            if (NS >= 0) {
                TYPE += "N";
                explanation += "You prefer to exercise your imagination. ";
            } else {
                TYPE += "S";
                explanation += "You mostly view things through the lens of now. ";
            } 
            if (TF >= 0) {
                TYPE += "T";
                explanation += "You (mostly) make logical decisions. ";
            } else {
                TYPE += "F";
                explanation += "You mostly make decisions based on the feelings of others rather than yourself. ";
            }
            if (JP >= 0) {
                TYPE += "J";
                explanation += "You are mostly organized. ";
            } else {
                TYPE += "P";
                explanation += "You are flexible and adapting. ";
            }
            TYPE += "-";
            TYPE += W / (questions.length - 1) * 20;
            // if (questions.length == 11) W *= 2;
            explanation += "\n\n The number is your deviation from the average teenager. 1-3 means you are very similar to the average teenager. 4-6 means you are moderately unique. 0 or 7+ means you may not be a teenager.";
            createDiv("results", "Your p-type (Myer's Briggs Personality) is " + TYPE + "\n\n" + explanation);
            document.getElementById("feedback").style.display = "None";
            var formData = new FormData();
            formData.append("ie", IE);
            formData.append("ns", NS);
            formData.append("tf", TF);
            formData.append("jp", JP);
            formData.append("w", W);
            formData.append("type",getSelectedAnswer("p-type"));
            formData.append("feedback",document.getElementById('comment').value.replace("'","\\'"));
            formData.append("name",document.getElementById('name').value.replace("'","\\'"));
            let answers = "";
            for (let i = 0; i < questions.length; i++) {
                let answer = getSelectedAnswerText(questions[i]);
                answers += "|" + questions[i] + ":" + answer;
            }
            formData.append("questions", answers);
            
            var request = new XMLHttpRequest();
            request.open("POST", "https://swap0nline.com/personalitytest.php");
            request.send(formData);
        }
        
        function createDiv(divName, text){
            var createDiv = document.createElement('div'); 
            createDiv.setAttribute("id", divName);
            createDiv.setAttribute("style", "white-space: pre-line;")
            createDiv.setAttribute("class", "question");
            var heading = document.createElement('h1'); 
            var question = document.createTextNode(text); 
            heading.appendChild(question);
            createDiv.appendChild(heading);
            document.body.appendChild(createDiv);
        }
    </script>
    <style>
        #feedback>label {
            width: 50%;
            float: left;
        }
        #feedback>h1 {
            clear: both;
        }
        h1 {
            padding-bottom: 20px;
        }
        .question {
            padding: 2rem;
            background-color: rgba(238, 204, 255,0.7);
            position: absolute;
            top: 90px;
            bottom: 0px;
            left: 0px;
            right: 0px;
            height: fit-content;
            margin: auto;
            max-height: 100%;
            overflow: auto;
        }
        :root {
          --form-control-color: rebeccapurple;
        }
        *,
        *:before,
        *:after {
          box-sizing: border-box;
        }
        .form-control {
          font-family: system-ui, sans-serif;
          font-size: 1.5rem;
          font-weight: bold;
          line-height: 1.1;
          display: grid;
          grid-template-columns: 1em auto;
          gap: 0.5em;
        }
        input[type="radio"] {
          -webkit-appearance: none;
            appearance: none;
            background-color: #eeccff;
            margin: 0;
            font: inherit;
            color: currentColor;
            width: 1.15em;
            height: 1.15em;
            border: 0.15em solid currentColor;
            border-radius: 50%;
            transform: translateY(-0.075em);
            display: grid;
            place-content: center;
        }
        
        .form-control + .form-control {
          margin-top: 0.4em;
        }
        
        input[type="radio"]::before {
          content: "";
          width: 0.65em;
          height: 0.65em;
          border-radius: 50%;
          transform: scale(0);
          transition: 120ms transform ease-in-out;
          box-shadow: inset 1em 1em var(--form-control-color);
          /* Windows High Contrast Mode */
          background-color: CanvasText;
        }
        
        input[type="radio"]:checked::before {
          transform: scale(1);
        }
        input[type="radio"]:focus {
          outline: max(2px, 0.15em) solid currentColor;
          outline-offset: max(2px, 0.15em);
        }
        
        button {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px 20px;
            height: 2rem;
            width: 20%;
            border: none;
            border-radius: 4px;
            background: #9c09d1;
            color: #fff;
        }
        
        .cookie-consent{
            position: fixed;
            top: 88px;
            right: 20px;
            width: 260px;
            padding-top: 7px;
            height: 83px;
            color: #fff;
            
            line-height: 20px;
            padding-left: 10px;
            padding-right: 10px;
            font-size: 14px;
            background: #292929;
            z-index: 120;
            cursor: pointer;
            border-radius: 3px;
        }
        
        .allow-button{
            height: 20px;
            width: 240px;
            color: #fff;
            font-size: 12px;
            line-height: 10px;
            border-radius: 3px;
            margin-top: 4px;
            border: 1px solid purple;
            background-color: purple;
        }
    </style>
</body>
</html> 