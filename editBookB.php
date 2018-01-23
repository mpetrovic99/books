<?php
include "databaseB.php";
session_start();
//print_r($_SESSION);

$num=$_GET['num'];
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM booksb where id = $num";
$q = $pdo->prepare($sql);
$q->execute();
$data = $q->fetch(PDO::FETCH_ASSOC);
$naziv=$data['nameBo'];
$autor=$data['authorBo'];
$opis=$data['descriptionBo'];




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
   
   <!--     <a href="index.php">Home</a>
        <a href="addbookB.php">Dodaj knjigu</a>
        <a href="mybooksReportB.php">Moje knjige</a>
        <a href="mybookGroupsB.php">Knjige grupa</a>-->



        <form name="addbook" action="updatebookformB.php" method="POST">
            <label >Naziv knjige(nije dozvoljen unos postojuće knjige): </label> 
            <input type="text" name="naslov" value="<?php echo $naziv; ?>" required="" oninvalid="this.setCustomValidity('Unesite naziv knjige')" oninput="setCustomValidity('')"/>
            <label >Autor: </label>
            <input type="text" name="autor" value="<?php echo $naziv; ?>" required="" oninvalid="this.setCustomValidity('Unesite ime autora')" oninput="setCustomValidity('')"/>
            <label >Opis: </label>
            <input type="text" value="<?php echo $opis; ?>" name="opis"  />
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
            <input type="hidden" name="idBook" value="<?php echo $num; ?>"/>
            <button class="button" type="submit">Ažuriraj</button>
        </form>

  </div></div>
            <?php include 'navigationb.php'; ?>
                </div>



    </body>
</html>

