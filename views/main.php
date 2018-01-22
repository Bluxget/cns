<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
		<title>ANNA - <?=$this->getTitle(); ?></title>

		<!-- CSS -->
		<link href="css/material-icons.css" rel="stylesheet">
		<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
		<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	</head>

	<body>
		<nav class="blue-grey darken-4" role="navigation">
			<div class="nav-wrapper container"><a id="logo-container" href="index.php" class="brand-logo">Jonathan Bulach</a>
				<ul class="right hide-on-med-and-down">
					<li><a href="">Classeurs</a></li>
					<li><a href="">Mon compte</a></li>
					<li><a href="">Déconnexion</a></li>
				</ul>

				<ul id="nav-mobile" class="side-nav">
					<li><a href="">Classeur</a></li>
					<li><a href="">Mon compte</a></li>
					<li><a href="">Deconnexion</a></li>
				</ul>
				<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i> Menu</a>
			</div>
		</nav>

		<div class="row">

			<div class="col s12 m4 l3">
				<h5 class="center">Pages</h5>
				<ul>
					<li><a href="index.php">Page 1</a></li>
					<li><a href="index.php?page=competences">Page 2</a></li>
					<li><a href="index.php?page=realisations">Page 3</a></li>
					<li><a href="index.php?page=experiences">Page 4</a></li>
				</ul>
			</div>

			<div class="col s12 m8 l9">
				<?php include_once $content; ?>
			</div>
		</div>

		
		<footer class="page-footer grey darken-4">
			<div class="container">
				<div class="row">
					<div class="col l6 s12">
						<h5 class="white-text">Jonathan Bulach</h5>
						<p class="grey-text text-lighten-4">Développeur informatique actuellement apprenti au sein de l'entreprise <a class="blue-text text-lighten-3" href="https://www.svg-informatique.com">SVG Informatique</a> qui est en collaboration avec le centre de formation <a class="blue-text text-lighten-3" href="http://www.formation-technologique.fr">CFAI 84</a>.</p>
					</div>
					<div class="col l3 offset-l2 s12">
						<h5 class="white-text">Menu</h5>
						<ul>
							<li><a class="white-text" href="index.php">Profil</a></li>
							<li><a class="white-text" href="index.php?page=competences">Compétences</a></li>
							<li><a class="white-text" href="index.php?page=realisations">Réalisations</a></li>
							<li><a class="white-text" href="index.php?page=experiences">Formations & Expériences</a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="footer-copyright">
				<div class="container">
				Crée par <a class="blue-text text-lighten-3" href="">Jonathan BULACH</a> avec <a class="blue-text text-lighten-3" href="http://materializecss.com">Materialize</a>
				</div>
			</div>
		</footer>


		<!-- Scripts-->
		<script src="js/jquery.min.js"></script>
		<script src="js/materialize.js"></script>
		<script src="js/init.js"></script>
	</body>
</html>
