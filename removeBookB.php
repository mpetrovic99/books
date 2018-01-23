<?php
include "databaseB.php";
session_start();
//print_r($_SESSION);
$user= $_SESSION["user"];
$num=$_GET['num'];
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



$sql = "DELETE FROM ratingsb WHERE bookIdR=".$num." and userIdR=".$user." ";
$q = $pdo->prepare($sql);

    $response = $q->execute(array());
    





?>
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
 <!--       <header><h1>Moje knjige</h1></header>
        <a href="index.php">Home</a>
        <a href="addbookB.php">Dodaj knjigu</a>
        <a href="mybooksReportB.php">Moje knjige</a>
        <a href="mybookGroupsB.php">Knjige grupa</a>-->
        
        <br>
        Uspješno ste uklonili knjigu!





  </div></div>
            <?php include 'navigationb.php'; ?>
                </div>

    </body>
</html>