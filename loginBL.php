<html>
    <body>
<head>
        <link rel="stylesheet" href="assets/css/main.css" />
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/skel.min.js"></script>
        <script src="assets/js/util.js"></script>
        <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
        <script src="assets/js/main.js"></script>
        
    </head>
                    <div id="wrapper">

            <!-- Main -->
            
                <div id="main">
						<div class="inner">
                                                    <header id="header">
									<a href="index.php" class="logo"><strong>Moja knjiga</strong> HEXIS</a>
									<ul class="icons">
										<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
										<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
										<li><a href="#" class="icon fa-snapchat-ghost"><span class="label">Snapchat</span></a></li>
										<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
										<li><a href="#" class="icon fa-medium"><span class="label">Medium</span></a></li>
									</ul>
								</header>
<?php
$key="hexis";
ini_set('display_errors', 'Off');
include 'databaseB.php';
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

$test=0;
$test2=0;
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM usersb";
foreach ($pdo->query($sql) as $row) {
    $usernametest = $row['username'];
    $passwordtest = $row['password'];
    $userid = $row['id'];



    if ($usernametest === $username) {
       
        $test = 1;
    }
    if (password_verify($password, $passwordtest)) {
       
        $test2 = 1;
    }
    if($test===1 and $test2===1){
       echo "ulogiran!";
       echo "<a href='index.php'>Home</a>";
       $test=0; $test2=0;
       $_SESSION["user"] = $userid;
      // echo $userid;
    }
    else{
        $test=0; $test2=0;
    }
}

if($_SESSION["user"]===null){
    echo "Krivo korisnicko ime i/ili lozinka!";
    echo'<br/><button onclick="goBack()">Nazad</button>';
    
}

?>
                                                      </div></div>
            <?php include 'navigationb.php'; ?>
                </div>
<script>
function goBack() {
    window.history.back();
}
</script>
                                                </body>
                                                </html>