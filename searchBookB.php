<?php
include 'databaseB.php';
session_start();
$user = $_SESSION["user"];
$auto = "";
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM booksb";
foreach ($pdo->query($sql) as $row) {
    $auto = $auto . "'" . $row['nameBo'] . "',";
}
$auto = substr($auto, 0, -1);
//echo $auto;
Database::disconnect();
if (isset($_POST['naslov'])) {
    $ime = $_POST['naslov'];
} else {
    $ime = "";
}
?>
<html>
<head>
    <link rel="stylesheet" href="assets/css/main.css" />
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/util.js"></script>
    <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
    <script src="assets/js/main.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.css" />
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
    <script>
        $(document).ready(function () {
            $("#txtpname").autocomplete({
                source: [
<?php echo $auto; ?>
                ],
                minLength: 1
            });
        });
    </script>
    <form name="addbook" action="" method="POST">


        <label >Naziv knjige(nije dozvoljen unos postojuće knjige): </label> 
        <input value="<?php echo $ime; ?>" id="txtpname" type="text" name="naslov" required="" oninvalid="this.setCustomValidity('Unesite naziv knjige')" oninput="setCustomValidity('')"/>

        <button class="button" type="submit">Pokaži</button>
    </form>



    <?php
    if ($ime <> "") {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM booksb B INNER JOIN ratingsb R on R.bookIdR = B.id  where B.nameBo LIKE '%" . $ime . "%' group by B.id";
        foreach ($pdo->query($sql) as $row) {
            echo "<br>Naziv knjige: ";
            echo $row['nameBo'];
            echo"<br>Ime autora: ";
            echo $row['authorBo'];
            echo"<br>Opis: ";
            echo $row['descriptionBo'];
            $idBook = $row['bookIdR'];
            echo $idBook;
            
            //echo "<br>Ocjena: ";
            //echo $row['ratingR'];
            //echo '<br>Dodano: ';
            //echo $row['dateB'];
            echo "<br>";


   $pdo3 = Database::connect();
    $pdo3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql3 = "SELECT * FROM ratingsb where bookIdR=".$idBook." and userIdR= ".$user."";
    $q3 = $pdo3->prepare($sql3);
    $q3->execute();
    $data3 = $q3->fetch(PDO::FETCH_ASSOC);
    $idtest = $data3['id'];

    if ($idtest===null) {


        echo "<a href='addtomybooksB.php?name=".$row['nameBo']."&autor=".$row['authorBo']."&opis=".$row['descriptionBo']."&num=".$row['bookIdR']."'>Dodaj u moje knjige</a><br>";
        $idtest=null;
    }
}
        }
    
    Database::disconnect();
    ?>
    <br><br>
    <a href="index.php">Home</a>
      </div></div>
            <?php include 'navigationb.php'; ?>
                </div>
</body>

</html>
