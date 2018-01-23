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

include 'databaseB.php';
$key="hexis123";
$username = $_POST['username'];
$password = $_POST['password'];
$password = password_hash($password, PASSWORD_DEFAULT);
$name = $_POST['first_name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$group = $_POST['group'];
$test = 0;
$test2 = 0;
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM usersb";
foreach ($pdo->query($sql) as $row) {
    $usernametest = $row['username'];
    $emailtest = $row['email'];



    if ($usernametest === $username) {
        //echo "iskorišteno korisničko ime";
        $test = 1;
    }
    if ($emailtest === $email) {
        //echo "već ste se registrirali s ovim e-mailom!";
        $test2 = 1;
    }
}

if ($test === 1) {
    echo "iskorišteno kor. ime";
    echo'<button onclick="goBack()">Nazad</button>';
} else if ($test2 === 1) {
    echo "iskorišten email";
    echo'<button onclick="goBack()">Nazad</button>';
} else {
    $sql = "INSERT INTO usersb (username,password,name,surname,email,groupId) values(?, ?, ?, ?, ?,?)";
    $q = $pdo->prepare($sql);
    $q->execute(array($username, $password, $name, $surname, $email, $group));
    Database::disconnect();
    //header("Location: index.php");
    echo "Uspješno ste se registrirali!";
    echo "<a href='loginB.php'>Ulogiraj se</a>";
}

?>
<script>
function goBack() {
    window.history.back();
}
</script>
  </div></div>
            <?php include 'navigationb.php'; ?>
                </div>
                                                </body>
                                                </html>