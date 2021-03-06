<?php
include 'databaseB.php';
session_start();
$user = $_SESSION["user"];
if (isset($_POST['mjesec'])) {
    $mjesec = $_POST['mjesec'];
} else {
    $mjesec = date('m');
}
if (isset($_POST['godina'])) {
    $godina = $_POST['godina'];
} else {
    $godina = date('Y');
}
if (isset($_POST['grupa'])) {
    $grupa = $_POST['grupa'];
} else {
    $grupa = 1;
}

if ($mjesec === "1") {
    $selected1 = "selected";
} else {
    $selected1 = " ";
}
if ($mjesec === "2") {
    $selected2 = "selected";
} else {
    $selected2 = " ";
}
if ($mjesec === "3") {
    $selected3 = "selected";
} else {
    $selected3 = " ";
}
if ($mjesec === "4") {
    $selected4 = "selected";
} else {
    $selected4 = " ";
}
if ($mjesec === "5") {
    $selected5 = "selected";
} else {
    $selected5 = " ";
}
if ($mjesec === "6") {
    $selected6 = "selected";
} else {
    $selected6 = " ";
}
if ($mjesec === "7") {
    $selected7 = "selected";
} else {
    $selected7 = " ";
}
if ($mjesec === "8") {
    $selected8 = "selected";
} else {
    $selected8 = " ";
}
if ($mjesec === "9") {
    $selected9 = "selected";
} else {
    $selected9 = " ";
}
if ($mjesec === "10") {
    $selected10 = "selected";
} else {
    $selected10 = " ";
}
if ($mjesec === "11") {
    $selected11 = "selected";
} else {
    $selected11 = " ";
}
if ($mjesec === "12") {
    $selected12 = "selected";
} else {
    $selected12 = " ";
}

if ($godina === "2018") {
    $selected2018 = "selected";
} else {
    $selected2018 = " ";
}
if ($godina === "2019") {
    $selected2019 = "selected";
} else {
    $selected2019 = " ";
}
if ($godina === "2020") {
    $selected2020 = "selected";
} else {
    $selected2020 = " ";
}
if ($godina === "2021") {
    $selected2021 = "selected";
} else {
    $selected2021 = " ";
}
if ($godina === "2022") {
    $selected2022 = "selected";
} else {
    $selected2022 = " ";
}
if ($godina === "2023") {
    $selected2023 = "selected";
} else {
    $selected2023 = " ";
}
if ($godina === "2024") {
    $selected2024 = "selected";
} else {
    $selected2024 = " ";
}
if ($godina === "2025") {
    $selected2025 = "selected";
} else {
    $selected2025 = " ";
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
    <form name="addbook" action="" method="POST">
        <p>Za pregled povijesti odaberite mjesec i godinu</p>
        <label>Odaberite mjesec: </label>
        <select type="select" name="mjesec" >
            <option value="1" <?php echo $selected1 ?> >siječanj</option>
            <option value="2" <?php echo $selected2 ?>>veljača</option>
            <option value="3" <?php echo $selected3 ?>>ožujak</option>
            <option value="4" <?php echo $selected4 ?>>travanj</option>
            <option value="5" <?php echo $selected5 ?>>svibanj</option>
            <option value="6" <?php echo $selected6 ?>>lipanj</option>
            <option value="7" <?php echo $selected7 ?>>srpanj</option>
            <option value="8" <?php echo $selected8 ?>>kolovoz</option>
            <option value="9" <?php echo $selected9 ?>>rujan</option>
            <option value="10" <?php echo $selected10 ?>>listopad</option>
            <option value="10" <?php echo $selected11 ?>>studeni</option>
            <option value="10" <?php echo $selected12 ?>>prosinac</option>
        </select>
        <label>Odaberite godinu: </label>
        <select type="select" name="godina" >
            <option <?php echo $selected2018 ?> value="2018" selected="">2018</option>
            <option <?php echo $selected2019 ?> value="2019">2019</option>
            <option <?php echo $selected2020 ?> value="2020">2020</option>
            <option <?php echo $selected2021 ?> value="2021">2021</option>
            <option <?php echo $selected2022 ?> value="2022">2022</option>
            <option <?php echo $selected2023 ?> value="2023">2023</option>
            <option <?php echo $selected2024 ?> value="2024">2024</option>
            <option <?php echo $selected2025 ?> value="2025">2025</option>
        </select>

        <label>Odaberite grupu</label>
        <select type="select" name="grupa" required="">
            <?php
            $i = 1;
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM groupsb";
            foreach ($pdo->query($sql) as $row) {
                if ($row[id] === $grupa) {
                    $selected[$i] = "selected";
                }

                echo '<option ' . $selected[$i] . ' value="' . $row['id'] . '">' . $row['nameG'] . '</option>';
                $i++;
            }
            ?>   
        </select>

        <button class="button" type="submit">Pokaži</button>
    </form>

<?php
echo "Odabran je: ";
echo "mjesec: ";
echo $mjesec;
echo " ";
echo "godina: ";
echo $godina;
echo "<br>grupa: ";
$sql = "SELECT * FROM groupsb where id=" . $grupa . "";
$q = $pdo->prepare($sql);
$q->execute();
$data = $q->fetch(PDO::FETCH_ASSOC);
$grupaIme = $data['nameG'];
echo $grupaIme;
echo "<br>";


$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM booksb B INNER JOIN ratingsb R on R.bookIdR = B.id  "
        . "   INNER JOIN (SELECT AVG(ratingR) as PROO, bookIdR FROM ratingsb group by bookIdR) RA on RA.bookIdR = B.id   "
        . "  INNER JOIN usersb U on U.id = B.idUserBo INNER JOIN groupsb G on G.id = U.groupId "
        . " where  MONTH(dateB) = " . $mjesec . " AND YEAR(dateB) = " . $godina . " "
        . "and groupId = " . $grupa . " group by R.bookIdR order by PROO desc";
foreach ($pdo->query($sql) as $row) {
    echo "<br>Naziv knjige: ";
    $idBook = $row['bookIdR'];
    echo $row['nameBo'];
    echo"<br>Ime autora: ";
    echo $row['authorBo'];
    echo"<br>Opis: ";
    echo $row['descriptionBo'];
    echo "<br>Ocjena: ";
    $pdo1 = Database::connect();
    $pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql2 = "SELECT AVG(ratingR) as PRO FROM ratingsb R INNER JOIN usersb U on U.id = R.userIdR where bookIdR = " . $idBook . " and U.groupId=" . $grupa . "";
    $q2 = $pdo1->prepare($sql2);
    $q2->execute();
    $data = $q2->fetch(PDO::FETCH_ASSOC);
    $ocjena = $data['PRO'];
    //echo $row['ratingR'];
    echo $ocjena;
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
    }
    echo "<hr>";
}
Database::disconnect();
?>

<br>

  </div></div>
            <?php include 'navigationb.php'; ?>
                </div>
                                                </body>
                                                </html>