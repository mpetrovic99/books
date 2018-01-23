<?php
include 'databaseB.php';
if (isset($_GET['email'])) {
    $emailI = $_GET['email'];
} else {
    $emailI = "";
}


if (isset($_GET['group'])) {
    $groupI = $_GET['group'];
} else {
    $groupI = "gr0";
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
        <form name="registration" action="registrationB.php" method="POST">
            <label >Korisničko ime: </label>
            <input type="text" name="username" required="" oninvalid="this.setCustomValidity('Unesite korisnicko ime')" oninput="setCustomValidity('')"/>
            <label >Lozinka: </label>
            <input type="password" name="password" required="" oninvalid="this.setCustomValidity('Unesite lozinku')" oninput="setCustomValidity('')"/>
            <label >Ime: </label>
            <input type="text" name="first_name" required="" oninvalid="this.setCustomValidity('Unesite ime')" oninput="setCustomValidity('')" />
            <label >Prezime: </label>
            <input type="text"  name="surname" required="" oninvalid="this.setCustomValidity('Unesite prezime')" oninput="setCustomValidity('')"/>
            <label >Email: </label>
            <input type="email" value="<?php echo $emailI; ?>" name="email" required="" oninvalid="this.setCustomValidity('Unesite e-mail')" oninput="setCustomValidity('')"/>
            <br/>
            <select type="select" name="group" required="">
                <?php
                if ($groupI === "gr0") {
                    $pdo = Database::connect();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $sql = "SELECT * FROM groupsb";
                    foreach ($pdo->query($sql) as $row) {


                        echo '<option value="' . $row['id'] . '">' . $row['nameG'] . '</option>';
                    }
                } else {
                    $pdo = Database::connect();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $sql = "SELECT * FROM groupsb where id=".$groupI."";
                    foreach ($pdo->query($sql) as $row) {


                        echo '<option value="' . $row['id'] . '">' . $row['nameG'] . '</option>';
                    }
                }
                ?>   
            </select>
            <br/>
            <button class="button" type="submit">Pošalji</button>
        </form>
                                                      </div></div>
            <?php include 'navigationb.php'; ?>
                </div>
    </body>
</html>

