<?php
include "databaseB.php";
session_start();
$user= $_SESSION["user"];
//print_r($_SESSION);
$name=$_GET['name'];
$autor=$_GET['autor'];
$opis=$_GET['opis'];
$num=$_GET['num'];

$auto="";
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM booksb";
foreach ($pdo->query($sql) as $row) {
    $auto=$auto."'".$row['nameBo']."',";
    
    
    
}
$auto = substr($auto, 0, -1);
//echo $auto;
Database::disconnect();

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
  <!--      <a href="index.php">Home</a>
        <a href="addbookB.php">Dodaj knjigu</a>
        <a href="mybooksReportB.php">Moje knjige</a>
        <a href="mybookGroupsB.php">Knjige grupa</a>-->



        <form name="addbookrating" action="addbookformRatingB.php" method="POST">
            <label >Naziv knjige </label> 
            <h3><?php echo $name; ?></h3>
            <label >Autor: </label>
            <h3><?php echo $autor; ?></h3>
            <label >Opis: </label>
            <h3><?php echo $opis; ?></h3>
            <label >Ocjena: </label>
            <select type="select" name="ocjena" required="" oninvalid="this.setCustomValidity('Ocjenite knjigu')" oninput="setCustomValidity('')">
                <option value="1" selected="">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
            <input type="hidden" name="naslov" value="<?php echo $num; ?>"/>
            <button class="button" type="submit">Dodaj</button>
        </form>


  </div></div>
            <?php include 'navigationb.php'; ?>
                </div>


    </body>
</html>

