<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
		<title>CNS - <?=$this->getTitle(); ?></title>

		<!-- CSS -->
		<link href="css/material-icons.css" rel="stylesheet">
		<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
		<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	</head>

	<body class="grey lighten-2">
		<div class="navbar-fixed">
			<nav class="blue-grey darken-4" role="navigation">
				<div class="nav-wrapper">
					<a href="#" data-activates="slide-out" class="button-collapse show-on-large"><i class="material-icons">menu</i></a>
					<a id="logo-container" href="index.php" class="brand-logo center">CNS - <?=$this->getTitle(); ?></a>
				</div>
			</nav>
		</div>


		<ul id="side_pages_classeur" class="dropdown-content">
			<li><a href="#!">Page 1</a></li>
			<li><a href="#!">Page 2</a></li>
			<li class="divider"></li>
		</ul>
		
		<ul id="slide-out" class="side-nav">
			<li>
				<div class="user-view blue-grey darken-4">
					<a href="#!name"><span class="white-text name">John Doe</span></a>
					<a href="#!email"><span class="white-text email">jdandturk@gmail.com</span></a>
				</div>
			</li>
			<li><a href="?action=disconnect">Deconnexion</a></li>
			<li class="divider"></li>
			<li><a href="">Classeur</a></li>
			<li><a class="dropdown-button" href="#!" data-activates="side_pages_classeur">Pages<i class="material-icons right">arrow_drop_down</i></a></li>
		</ul>


		<div class="row">
		</div>


		<div class="row">
			<div class="col l2 xl2 hide-on-med-and-down">
				
			</div>

			<div class="col s12 m12 l8 xl8 z-depth-4 center white">
				<?php include_once $content; ?>
			</div>

			<div class="col l2 xl2 hide-on-med-and-down">
				
			</div>
		</div>


		<!-- Scripts-->
		<script src="js/jquery.min.js"></script>
		<script src="js/materialize.js"></script>
		<script src="js/init.js"></script>
	</body>
</html>
