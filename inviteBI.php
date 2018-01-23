<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="assets/css/main.css" />
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/skel.min.js"></script>
        <script src="assets/js/util.js"></script>
        <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
        <script src="assets/js/main.js"></script>
        <title>Moja knjiga</title>
    </head>
    <body>
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
include "databaseB.php";
session_start();
//print_r($_SESSION);
$group=$_POST['group'];
$email=$_POST['email'];
$test=0;
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $sql = "SELECT * FROM usersb";
                foreach ($pdo->query($sql) as $row) {

                        if($row['email']===$email){
                            echo "korisnik postoji!";
                            $test=1;
                        }
                    
                    
                }
           



if($test<>1){
$sql = "INSERT INTO usersb (email, groupId) values(?, ?)";
    $q = $pdo->prepare($sql);
    $q->execute(array($email, $group));
Database::disconnect();
echo"Korisniku je poslana pozivnica.";
mail($email, "Pozivnica u Moja knjiga!", "http://nekisite.hr/registerB.php?email=$email&group=$group", "Pozivamo vas da se pridružite u našu grupu za knjige!");
}
echo'<br/><button onclick="goBack()">Nazad</button>';
        ?>
                                                      </div></div>
            <?php include 'navigationb.php'; ?>
                </div>
    </body>
    <script>
function goBack() {
    window.history.back();
}
</script>
</html>

