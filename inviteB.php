<?php
include "databaseB.php";
session_start();
//print_r($_SESSION);
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
        <form name="registration" action="inviteBI.php" method="POST">
            <label>Unesite e-mail za pozivnicu</label>
            <input type="email" name="email" required=""/>
            <label>Odaberite grupu</label>
            <select type="select" name="group" required="">
                <?php
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $sql = "SELECT * FROM groupsb";
                foreach ($pdo->query($sql) as $row) {


                    echo '<option value="' . $row['id'] . '">' . $row['nameG'] . '</option>';
                    
                }
                ?>   
            </select>
            <button class="button" type="submit">Pozovi</button>
        </form>
        <h3>Dodaj novu grupu</h3>
        <form name="addGroup" action="addGroupB.php" method="POST">
            <label>Unesite naziv nove grupe</label>
            <input type="text" name="group" required=""/>
           
              
            </select>
            <button class="button" type="submit">Dodaj</button>
        </form>
        
        
        
        
        
        <?php
      /*  if ($_SESSION <> null) {
            echo "Pozz!";
            echo "<br>";
            echo "<a href='logoutB.php'>Izlogiraj se</a>";
        }*/
        ?>
        <a href="index.php">Home</a>
          </div></div>
            <?php include 'navigationb.php'; ?>
                </div>
    </body>
</html>

