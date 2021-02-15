        <div class="overlay"></div>
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <h3 class="my-heading ">BANABANA</h3>
                </a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-bars mfa-white"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
					 <li class="nav-item">
                            <a class="nav-link" href="#home">ACCUEIL</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#overview">SERVICES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">CONTACT</a>
                        </li>

                    </ul>

                </div>

            </div>
        </nav>

        <div class="tophead" >
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-7 ">
                        <h1 class="title-main wow fadeInLeft" data-wow-duration="1.5s">Prestation de services</h1>
                        <h3 class="subtitle-main wow fadeInUp" data-wow-duration="1.1s">Nous sommes ici pour aider à faire vos achats depuis la Chine, en commençant par trouver des bons produits à bons prix, verifier les produits à la livraison et enfin embarquer les colis pour la destination finale.</h3>
						<div class="top-btn-block wow fadeInUp" data-wow-duration="2.5s">
							<a href="#overview" class="btn-explore ">Explorer</a>
                            <?php 
                                session_start();
                                if (!empty($_SESSION['utilisateur'])) {
                                    echo '<a href="admin-index.php" class="btn-account ">Mon profil</a>';
                                } else {
                                    echo '<a href="login.php" class="btn-account ">Se Connecter</a>';
                                    echo '<a href="create-compte.php" class="btn-account ">Créer un compte</a>';
                                }
                                
                             ?>
						</div>
                    </div>
                </div>
            </div>

        </div>
        <div class="sesgoabajo"></div>