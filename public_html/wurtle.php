<?php
include('./classes/DB.php');
include('./classes/Login.php');
include('./classes/Post.php');
include('./classes/Comment.php');
$showTimeline = False;
$user = "";
$profilepic = "";
$wins = 0;
$losses = 0;
$games = 0;

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if (Login::isLoggedIn()) {
    $user_id = Login::isLoggedIn();
    $showTimeline = True;
    $user = DB::query('SELECT username FROM usertable WHERE id=:user_id', array(':user_id'=>$user_id))[0]['username'];
    $profilepic = DB::query('SELECT profilepic FROM usertable WHERE id=:user_id', array(':user_id'=>$user_id))[0]['profilepic'];
} 
?>

<?php
    $url = "https://api.wordnik.com/v4/words.json/randomWords?hasDictionaryDef=true&minCorpusCount=300&minDictionaryCount=1&minLength=5&maxLength=5&limit=1&includePartOfSpeech=noun%2Cadjective%2Cverb&excludePartOfSpeech=proper-noun&api_key=a2a73e7b926c924fad7001ca3111acd55af2ffabf50eb4ae5";
    $response = file_get_contents($url);
    $response = (array)json_decode($response)['0'];
    $word = $response["word"];
    // while (preg_match('~^\p{Lu}~u', $word) OR strlen($word) != 5) {
    $i = 0;
    while (!preg_match('~[a-z][a-z][a-z][a-z][a-z]~', $word) AND $i <= 3) {
        $i = $i + 1;
        $response = file_get_contents($url);
        $response = (array)json_decode($response)['0'];
        $word = $response["word"];
    }
    if (!preg_match('~[a-z][a-z][a-z][a-z][a-z]~', $word) AND $i > 3) {
        $items = Array("peach","query","plane");
        $word = $items[array_rand($items)];
    }
    
    $futureWordles = Array("elder","frame","humor","pause","ulcer","ultra","robin","cynic","aroma","caulk","shake","pupal","dodge","swill","tacit","other","thorn","trove","bloke","vivid","spill","choke","rupee","nasty","mourn","ahead","brine","cloth","hoard","sweet","month","lapse","watch","today","focus","smelt","tease","cater","movie","lynch","saute","allow","renew","their","slosh","purge","chest","depot","epoxy","nymph","found","shall","harry","stove","lowly","snout","trope","fewer","shawl","natal","fibre","comma","foray","scare","stair","black","squad","royal","chunk","mince","slave","shame","cheek","ample","flair","foyer","cargo","oxide","plant","olive","inert","askew","heist","shown","zesty","hasty","trash","fella","larva","forgo","story","hairy","train","homer","badge","midst","canny","fetus","butch","farce","slung","tipsy","metal","yield","delve","being","scour","glass","gamer","scrap","money","hinge","album","vouch","asset","tiara","crept","bayou","atoll","manor","creak","showy","phase","froth","depth","gloom","flood","trait","girth","piety","payer","goose","float","donor","atone","primo","apron","blown","cacao","loser","input","gloat","awful","brink","smite","beady","rusty","retro","droll","gawky","hutch","pinto","gaily","egret","lilac","sever","field","fluff","hydro","flack","agape","wench","voice","stead","stalk","berth","madam","night","bland","liver","wedge","augur","roomy","wacky","flock","angry","bobby","trite","aphid","tryst","midge","power","elope","cinch","motto","stomp","upset","bluff","cramp","quart","coyly","youth","rhyme","buggy","alien","smear","unfit","patty","cling","glean","label","hunky","khaki","poker","gruel","twice","twang","shrug","treat","unlit","waste","merit","woven","octal","needy","clown","widow","irony","ruder","gauze","chief","onset","prize","fungi","charm","gully","inter","whoop","taunt","leery","class","theme","lofty","tibia","booze","alpha","thyme","eclat","doubt","parer","chute","stick","trice","alike","sooth","recap","saint","liege","glory","grate","admit","brisk","soggy","usurp","scald","scorn","leave","twine","sting","bough","marsh","sloth","dandy","vigor","howdy","enjoy","valid","ionic","equal","unset","floor","catch","spade","stein","exist","quirk","denim","grove","spiel","mummy","fault","foggy","flout","carry","sneak","libel","waltz","aptly","piney","inept","aloud","photo","dream","stale","vomit","ombre","fanny","unite","snarl","baker","there","glyph","pooch","hippy","spell","folly","louse","gulch","vault","godly","threw","fleet","grave","inane","shock","crave","spite","valve","skimp","claim","rainy","musty","pique","daddy","quasi","arise","aging","valet","opium","avert","stuck","recut","mulch","genre","plume","rifle","count","incur","total","wrest","mocha","deter","study","lover","safer","rivet","funny","smoke","mound","undue","sedan","pagan","swine","guile","gusty","equip","tough","canoe","chaos","covet","human","udder","lunch","blast","stray","manga","melee","lefty","quick","paste","given","octet","risen","groan","leaky","grind","carve","loose","sadly","spilt","apple","slack","honey","final","sheen","eerie","minty","slick","derby","wharf","spelt","coach","erupt","singe","price","spawn","fairy","jiffy","filmy","stack","chose","sleep","ardor","nanny","niece","woozy","handy","grace","ditto","stank","cream","usual","diode","valor","angle","ninja","muddy","chase","reply","prone","spoil","heart","shade","diner","arson","onion","sleet","dowel","couch","palsy","bowel","smile","evoke","creek","lance","eagle","idiot","siren","built","embed","award","dross","annul","goody","frown","patio","laden","humid","elite","lymph","edify","might","reset","visit","gusto","purse","vapor","crock","write","sunny","loath","chaff","slide","queer","venom","stamp","sorry","still","acorn","aping","pushy","tamer","hater","mania","awoke","brawn","swift","exile","birch","lucky","freer","risky","ghost","plier","lunar","winch","snare","nurse","house","borax","nicer","lurch","exalt","about","savvy","toxin","tunic","pried","inlay","chump","lanky","cress","eater","elude","cycle","kitty","boule","moron","tenet","place","lobby","plush","vigil","index","blink","clung","qualm","croup","clink","juicy","stage","decay","nerve","flier","shaft","crook","clean","china","ridge","vowel","gnome","snuck","icing","spiny","rigor","snail","flown","rabid","prose","thank","poppy","budge","fiber","moldy","dowdy","kneel","track","caddy","quell","dumpy","paler","swore","rebar","scuba","splat","flyer","horny","mason","doing","ozone","amply","molar","ovary","beset","queue","cliff","magic","truce","sport","fritz","edict","twirl","verse","llama","eaten","range","whisk","hovel","rehab","macaw","sigma","spout","verve","sushi","dying","fetid","brain","buddy","thump","scion","candy","chord","basin","march","crowd","arbor","gayly","musky","stain","dally","bless","bravo","stung","title","ruler","kiosk","blond","ennui","layer","fluid","tatty","score","cutie","zebra","barge","matey","bluer","aider","shook","river","privy","betel","frisk","bongo");
    date_default_timezone_set("America/Los_Angeles");
    $earlier = new DateTime("2022-02-07");
    $later = new DateTime();
    $abs_diff = ($later->diff($earlier))->format("%a");
    $currentWordle = $futureWordles[(int)$abs_diff];
?>

<?php
    if ($showTimeline) {
        if (isset($_POST['win'])) {
            if (!DB::query('SELECT user_id FROM wurtle WHERE user_id=:user_id', array(':user_id'=>$user_id))) {
                $conn = mysqli_connect("localhost", "u242050040_root", "Asdfjkl1234", "u242050040_swap");
                $sql = "INSERT INTO wurtle VALUES (0, $user_id, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')";
                if (mysqli_query($conn, $sql)) {
                      echo "New record created successfully";
                } else {
                      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                mysqli_close($conn);                                
            }
            // stats to save to the database 
            $win = $_POST['win'];
            $attempts = $_POST['attempts'];
            $time = $_POST['time'];

            if ($win == 'true') {
                DB::query('UPDATE wurtle SET wins=wins+1 WHERE user_id=:user_id', array(':user_id'=>$user_id));
                for ($x = 1; $x <= 6; $x++) {
                    if ($attempts == $x) {
                        DB::query('UPDATE wurtle SET attempt' . strval($x) . '=' . 'attempt' . strval($x) . '+1 WHERE user_id=:user_id', array(':user_id'=>$user_id));
                        //$wins = DB::query('SELECT wins FROM wurtle WHERE user_id=:user_id', array(':user_id'=>$user_id))[0]['wins'];
                    }            
                }
            } else {
                DB::query('UPDATE wurtle SET losses=losses+1 WHERE user_id=:user_id', array(':user_id'=>$user_id));
                //$losses = DB::query('SELECT losses FROM wurtle WHERE user_id=:user_id', array(':user_id'=>$user_id))[0]['losses'];
            }
            DB::query('UPDATE wurtle SET games=games+1 WHERE user_id=:user_id', array(':user_id'=>$user_id));
            
            exit();
        }
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
    </div>
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
    
    <div class="foreground">
<?php
    if ($showTimeline == false) {
        echo '<center><h1>Not logged in</h1></center>';
        echo '<center></center><form method="GET" action="/login.php?">
            <center><button class="button__submit" style="border-bottom: none;" type="submit">Login</button></center>
        </form></center>';
        echo '<center><form method="GET" action="/create-account.php?">
            <button class="button__submit" type="submit">Create Account</button>
            </form></center>';
    } else {
        echo '<center><h1 id="fancytitle">WURTLE</h1></center>';
    }
    
    if (isset($_POST['five'])) {
        echo 'worked';
    }
?>
    <a style="position:fixed; bottom: 0px; right: 0px; font-size: 6px;" href="http://www.freepik.com">Backgroung image designed by upklyak / Freepik</a>
    
    <center>
        <div>
            <button onclick="togglePopup()" style="display: inline-block; border: none; background: none"><img src="icons/stats.png" width="20" height="20"></button> <!--probably should move this somewhere else-->
            <div class="popup" id="popup-1">
                <div class="overlay"></div>
                <div class="content">
                    <div class="close-btn" onclick="togglePopup()">&times;</div>
                    <h1>STATISTICS</h1>
                    <?php 
                    if ($showTimeline) {
                        $games = DB::query('SELECT games FROM wurtle WHERE user_id=:user_id', array(':user_id'=>$user_id))[0]['games'];
                        $losses = DB::query('SELECT losses FROM wurtle WHERE user_id=:user_id', array(':user_id'=>$user_id))[0]['losses'];
                        $wins = DB::query('SELECT wins FROM wurtle WHERE user_id=:user_id', array(':user_id'=>$user_id))[0]['wins'];
                        if ($games == 0) {
                            $winRate = 0;
                        } else {
                            $winRate = round($wins / $games, 3) * 100;
                        }
                        if ($games != 1) {
                            echo $games." games";
                        } else {
                            echo $games." game";
                        } 
                        echo "<br>".$winRate."% win rate<br>";
                        if ($wins != 1) {
                            echo $wins." wins ";
                        } else {
                            echo $wins." win ";
                        }
                        if ($losses != 1) {
                            echo $losses." losses";
                        } else {
                            echo $losses." loss";
                        }
                    } else {
                        echo '<p>Not Logged In</p>';
                    }
                    ?>
                </div>
            </div>
            <div class="switch-button">
                <input class="switch-button-checkbox" type="checkbox" onclick="toggleWords(event);"></input>
                <label class="switch-button-label" for=""><span class="switch-button-label-span">Random</span></label>
            </div>
            <input type="button" class='button__post' id="answerBtn" value="Answer" style="min-width: 8em; display: none; padding-left: 10px; padding-right: 10px; width: auto;" onclick="showAnswer()"/><br>
            <form action="wurtle.php" method="post">
                <input class="line1" style="width:80px; height:80px; font-size: 3em; text-transform: uppercase;" maxlength="1" onmousedown="prevent()">
                <input class="line1" style="width:80px; height:80px; font-size: 3em; text-transform: uppercase;" maxlength="1" onmousedown="prevent()">
                <input class="line1" style="width:80px; height:80px; font-size: 3em; text-transform: uppercase;" maxlength="1" onmousedown="prevent()">
                <input class="line1" style="width:80px; height:80px; font-size: 3em; text-transform: uppercase;" maxlength="1" onmousedown="prevent()">
                <input class="line1" style="width:80px; height:80px; font-size: 3em; text-transform: uppercase;" maxlength="1" onmousedown="prevent()">
                <div style="padding-bottom: 5px;"></div>
                <input class="line2" style="width:80px; height:80px; font-size: 3em; text-transform: uppercase;" maxlength="1" onmousedown="prevent()">
                <input class="line2" style="width:80px; height:80px; font-size: 3em; text-transform: uppercase;" maxlength="1" onmousedown="prevent()">
                <input class="line2" style="width:80px; height:80px; font-size: 3em; text-transform: uppercase;" maxlength="1" onmousedown="prevent()">
                <input class="line2" style="width:80px; height:80px; font-size: 3em; text-transform: uppercase;" maxlength="1" onmousedown="prevent()">
                <input class="line2" style="width:80px; height:80px; font-size: 3em; text-transform: uppercase;" maxlength="1" onmousedown="prevent()">
                <div style="padding-bottom: 5px;"></div>
                <input class="line3" style="width:80px; height:80px; font-size: 3em; text-transform: uppercase;" maxlength="1" onmousedown="prevent()">
                <input class="line3" style="width:80px; height:80px; font-size: 3em; text-transform: uppercase;" maxlength="1" onmousedown="prevent()">
                <input class="line3" style="width:80px; height:80px; font-size: 3em; text-transform: uppercase;" maxlength="1" onmousedown="prevent()">
                <input class="line3" style="width:80px; height:80px; font-size: 3em; text-transform: uppercase;" maxlength="1" onmousedown="prevent()">
                <input class="line3" style="width:80px; height:80px; font-size: 3em; text-transform: uppercase;" maxlength="1" onmousedown="prevent()">
                <div style="padding-bottom: 5px;"></div>
                <input class="line4" style="width:80px; height:80px; font-size: 3em; text-transform: uppercase;" maxlength="1" onmousedown="prevent()">
                <input class="line4" style="width:80px; height:80px; font-size: 3em; text-transform: uppercase;" maxlength="1" onmousedown="prevent()">
                <input class="line4" style="width:80px; height:80px; font-size: 3em; text-transform: uppercase;" maxlength="1" onmousedown="prevent()">
                <input class="line4" style="width:80px; height:80px; font-size: 3em; text-transform: uppercase;" maxlength="1" onmousedown="prevent()">
                <input class="line4" style="width:80px; height:80px; font-size: 3em; text-transform: uppercase;" maxlength="1" onmousedown="prevent()">
                <div style="padding-bottom: 5px;"></div>
                <input class="line5" style="width:80px; height:80px; font-size: 3em; text-transform: uppercase;" maxlength="1" onmousedown="prevent()">
                <input class="line5" style="width:80px; height:80px; font-size: 3em; text-transform: uppercase;" maxlength="1" onmousedown="prevent()">
                <input class="line5" style="width:80px; height:80px; font-size: 3em; text-transform: uppercase;" maxlength="1" onmousedown="prevent()">
                <input class="line5" style="width:80px; height:80px; font-size: 3em; text-transform: uppercase;" maxlength="1" onmousedown="prevent()">
                <input class="line5" style="width:80px; height:80px; font-size: 3em; text-transform: uppercase;" maxlength="1" onmousedown="prevent()">
                <div style="padding-bottom: 5px;"></div>
                <input class="line6" style="width:80px; height:80px; font-size: 3em; text-transform: uppercase;" maxlength="1" onmousedown="prevent()">
                <input class="line6" style="width:80px; height:80px; font-size: 3em; text-transform: uppercase;" maxlength="1" onmousedown="prevent()">
                <input class="line6" style="width:80px; height:80px; font-size: 3em; text-transform: uppercase;" maxlength="1" onmousedown="prevent()">
                <input class="line6" style="width:80px; height:80px; font-size: 3em; text-transform: uppercase;" maxlength="1" onmousedown="prevent()">
                <input class="line6" style="width:80px; height:80px; font-size: 3em; text-transform: uppercase;" maxlength="1" onmousedown="prevent()"><div style="padding-bottom: 5px;"></div>
                
                <button type="reset" class='button__post' style="width: 8em;" onClick="location.reload();">Play Again</button>
                <script>
                    let ix = 0;
                    let row = 1;
                    let word = "<?php echo $word?>";
                    let blank = false;
                    console.log(word);
                    let inputs = document.getElementsByClassName("line1");
                    inputs[Math.min(ix,inputs.length-1)].focus();
                    function prevent(e) { // only allow the code to specify which textbox is in focus
                        inputs[Math.min(ix,inputs.length-1)].focus();
                        e = e || window.event;
                        e.preventDefault();
                    }
                    window.addEventListener("click", () => { // guarantee current input is in focus even when user clicks on something else
                        inputs[Math.min(ix,inputs.length-1)].focus();
                    });
                    window.addEventListener("keyup", function(event) {
                        inputs[Math.min(ix,inputs.length-1)].focus();
                        blank = false;
                        let current = inputs[ix];
                        let previous = inputs[ix-1];
                        let next = inputs[ix+1];
                        if (event.keyCode === 13) { // enter
                            letters = word.split('');
                            let check = true;
                            let guess = "";
                            for (let i = 0; i < 5; i++) {
                                guess += inputs[i].value;
                                if (inputs[i].value == "") {
                                    blank = true;
                                    // break; this loop now also combines the characters into a string so it can't skip iterations
                                } 
                            }
                            isValidEnglish(guess.toLowerCase()).then((isValid) => {
                            if (!isValid && word != guess.toLowerCase()) {
                                    alert("Not a valid english word (or the server is busy, you can try again in a few seconds)");
                            } else if (blank == false) {
                                let temp = word.slice();
                                for (let i = 0; i < 5; i++) {
                                    check = check && (letters[i] == inputs[i].value.toLowerCase());
                                    if (letters[i] == inputs[i].value.toLowerCase()) {
                                        let j = temp.indexOf(inputs[i].value.toLowerCase());
                                        temp = temp.slice(0, j) + temp.slice(j+1); // remove the matched character so it doesn't get matched multiple times if there's only one occurence of it
                                        inputs[i].style = "width:80px; height:80px; background-color: green; font-size: 3em; text-transform: uppercase;";
                                    } else if (temp.includes(inputs[i].value.toLowerCase())) {
                                        let j = temp.indexOf(inputs[i].value.toLowerCase());
                                        temp = temp.slice(0, j) + temp.slice(j+1); // remove the matched character so it doesn't get matched multiple times if there's only one occurence of it
                                        inputs[i].style = "width:80px; height:80px; background-color: #5A1F13; font-size: 3em; text-transform: uppercase;";
                                    } else {
                                        inputs[i].style = "width:80px; height:80px; background-color: grey; font-size: 3em; text-transform: uppercase;";
                                    }
                                }
                                row++;
                                ix=0;
                                inputs = document.getElementsByClassName("line"+row);
                                if (row <= 6) inputs[Math.min(ix,inputs.length-1)].focus();
                                if (check) {
                                    alert("You won");
                                    updateStats(true, row-1, null);
                                } else if (row > 6) {
                                    alert("You lost");
                                    updateStats(false, 6, null);
                                    document.getElementById("answerBtn").style.display='block'; // displays answer button
                                }
                            } else {
                                alert("Not enough letters");
                            }
                            });
                        } else if (event.keyCode === 8) { // delete
                            previous.focus();
                            previous.value = "";
                            ix--;
                        } else { // move
                            if (current.value.length >= current.maxLength) {
                                ix++;
                                next.focus();
                            }
                        }
                    });
                    async function isValidEnglish(word) {
                        let exceptions = ["asian", "soare"];
                        if (exceptions.includes(word)) return true;
                        const url = "https://api.wordnik.com/v4/word.json/" + word + "/definitions?limit=200&includeRelated=false&useCanonical=false&includeTags=false&api_key=a2a73e7b926c924fad7001ca3111acd55af2ffabf50eb4ae5";
                        let response = await fetch(url);
                        return response.ok;
                    }
                    function showAnswer() // displays answer
                    {
                        let btnText = document.getElementById("answerBtn");
                        if (btnText.value=="Answer") {
                            btnText.value = word;
                            
                            // get definition
                            const url = "https://api.wordnik.com/v4/word.json/" + word + "/definitions?limit=200&includeRelated=false&useCanonical=false&includeTags=false&api_key=a2a73e7b926c924fad7001ca3111acd55af2ffabf50eb4ae5";
                            setTimeout(fetch(url).then((res) => {res.text().then((text)=>{
                                let definition = JSON.parse(text)[0].text;
                                btnText.value += "--" + definition.replace(/<\/?[^>]+(>|$)/g, "");
                            })}),1000);
                        }
                        else btnText.value = "Answer";
                    }
                    function togglePopup () { // statistics popup
                        document.getElementById("popup-1").classList.toggle("active");
                    }
                    function updateStats(win, attempts, time) {
                        var formData = new FormData();
                        formData.append("win", win);
                        formData.append("attempts", attempts);
                        formData.append("time", time);
                        
                        var request = new XMLHttpRequest();
                        request.open("POST", "https://swap0nline.com/wurtle.php");
                        request.send(formData);
                    }
                    function toggleWords(event) {
                        if (event.target.checked) {
                            word = "<?php echo $currentWordle?>";
                        } else {
                            word = "<?php echo $word?>";
                        }
                        console.log(word);
                    }
                </script>
            </form>
        </div>
    </center>
    </div>
</body>
</html>














