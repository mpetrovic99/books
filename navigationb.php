				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">

							

							<!-- Menu -->
								<nav id="menu">
									<header class="major">
										<h2>Menu</h2>
									</header>
                                                                    <?php
                                                                    //error_reporting(E_ALL);
                                                                    ini_set('display_errors', 'Off');
                                                                    if($_SESSION<>null){
                                                                    echo '
									<ul>
										<li><a href="index.php">Home</a></li>
										<li><a href="inviteB.php">Pozovi korisnika</a></li>
										
										<li>
											<span class="opener">Knjige</span>
											<ul>
                                                                                            <li><a href="searchBookB.php">Pretraži knige</a></li>
                                                                                            <li><a href="mybookGroupsB.php">Knjige grupa</a></li>
                                                                                            <li><a href="mybooksReportB.php">Moje knjige</a></li>
                                                                                            <li><a href="addbookB.php">Dodaj knjigu</a></li>
		
											</ul>
		
						
										</li>
                                                                                <li><a href="logoutB.php">Izlogiraj se</a></li>

                                                                    </ul>';}else{
                                                                        echo '<ul>
										<li><a href="index.php">Home</a></li>
                                                                                <li><a href="loginB.php">Prijavi se</a></li>
                                                                                <li><a href="registerB.php">Registriraj se</a></li>
							
                                                                            

									</ul>';
                                                                    }
                                                                                
                                                                                ?>
								</nav>

							<!-- Section -->
								

							

							<!-- Footer -->
								<footer id="footer">
									<p class="copyright">&copy; HEXIS </p>
								</footer>

						</div>
					</div>