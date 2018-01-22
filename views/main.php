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

	<body>
		<!--
		<ul id="nav_pages_classeur" class="dropdown-content">
		  <li><a href="#!">Page 1</a></li>
			<li class="divider"></li>
		  <li><a href="#!">Page 2</a></li>
		  <li class="divider"></li>
		  <li><a href="#!">Page 3</a></li>
			<li class="divider"></li>
		  <li><a href="#!">Page 4</a></li>
			<li class="divider"></li>
		  <li><a href="#!">Page 5</a></li>
			<li class="divider"></li>
		  <li><a href="#!">Page 6</a></li>
			<li class="divider"></li>
		  <li><a href="#!">Page 7</a></li>
			<li class="divider"></li>
		  <li><a href="#!">Page 8</a></li>
			<li class="divider"></li>
		  <li><a href="#!">Page 9</a></li>
			<li class="divider"></li>
		  <li><a href="#!">Page 10</a></li>
			<li class="divider"></li>
		  <li><a href="#!">Page 11</a></li>
			<li class="divider"></li>
		  <li><a href="#!">Page 12</a></li>
			<li class="divider"></li>
		  <li><a href="#!">Page 13</a></li>
			<li class="divider"></li>
		  <li><a href="#!">Page 14</a></li>
		</ul>-->

		<nav class="blue-grey darken-4" role="navigation">

			<div class="nav-wrapper">
				<a href="#" data-activates="slide-out" class="button-collapse show-on-large"><i class="material-icons">menu</i></a>
				<a id="logo-container" href="index.php" class="brand-logo center">CNS - <?=$this->getTitle(); ?></a>
				<!--<ul class="right hide-on-med-and-down">
					<li><a href="">Classeurs</a></li>
					<li><a href="">Mon compte</a></li>
					<li><a href="">Déconnexion</a></li>
					<li><a class="dropdown-button" href="#!" data-activates="nav_pages_classeur">Pages<i class="material-icons right">arrow_drop_down</i></a></li>
				</ul>
-->
				<ul id="side_pages_classeur" class="dropdown-content">
				  <li><a href="#!">Page 1</a></li>
					<li class="divider"></li>
				  <li><a href="#!">Page 2</a></li>
				  <li class="divider"></li>
				  <li><a href="#!">Page 3</a></li>
					<li class="divider"></li>
				  <li><a href="#!">Page 4</a></li>
					<li class="divider"></li>
				  <li><a href="#!">Page 5</a></li>
					<li class="divider"></li>
				  <li><a href="#!">Page 6</a></li>
					<li class="divider"></li>
				  <li><a href="#!">Page 7</a></li>
					<li class="divider"></li>
				  <li><a href="#!">Page 8</a></li>
					<li class="divider"></li>
				  <li><a href="#!">Page 9</a></li>
					<li class="divider"></li>
				  <li><a href="#!">Page 10</a></li>
					<li class="divider"></li>
				  <li><a href="#!">Page 11</a></li>
					<li class="divider"></li>
				  <li><a href="#!">Page 12</a></li>
					<li class="divider"></li>
				  <li><a href="#!">Page 13</a></li>
					<li class="divider"></li>
				  <li><a href="#!">Page 14</a></li>
				</ul>
<!--
				<ul id="nav-mobile" class="side-nav">
					<li><a href="">Classeur</a></li>
					<li><a href="">Mon compte</a></li>
					<li><a href="">Deconnexion</a></li>
					<li><a class="dropdown-button" href="#!" data-activates="side_pages_classeur">Pages<i class="material-icons right">arrow_drop_down</i></a></li>
				</ul>
				<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i> Menu</a>-->
				<ul id="slide-out" class="side-nav">

					<li>
						<div class="user-view blue-grey darken-4">
				      <!--<div class="background">
				        <img src="images/office.jpg">
				      </div>-->
				      <!--<a href="#!user"><img class="circle" src="images/yuna.jpg"></a>-->
				      <a href="#!name"><span class="white-text name">John Doe</span></a>
				      <a href="#!email"><span class="white-text email">jdandturk@gmail.com</span></a>
			    	</div>
					</li>

					<li><a href="">Classeur</a></li>
					<li class="divider"></li>
					<li><a href="">Mon compte</a></li>
					<li class="divider"></li>
					<li><a href="">Deconnexion</a></li>
					<li class="divider"></li>
					<li><a class="dropdown-button" href="#!" data-activates="side_pages_classeur">Pages<i class="material-icons right">arrow_drop_down</i></a></li>
					<li class="divider"></li>
			  </ul>


			</div>

		</nav>


		<div class="row">

			<!--<div class="col s12 m4 l3">
				<h5 class="center">Pages</h5>
				<div class="collection fixed">
	        <a href="#!" class="collection-item active">Page 1</a>
	        <a href="#!" class="collection-item">Page 2</a>
	        <a href="#!" class="collection-item">Page 3</a>
	        <a href="#!" class="collection-item">Page 4</a>
					<a href="#!" class="collection-item">Page 5</a>
					<a href="#!" class="collection-item">Page 6</a>
					<a href="#!" class="collection-item">Page 7</a>
					<a href="#!" class="collection-item">Page 8</a>
					<a href="#!" class="collection-item">Page 9</a>
					<a href="#!" class="collection-item">Page 10</a>
					<a href="#!" class="collection-item">Page 11</a>
					<a href="#!" class="collection-item">Page 12</a>
					<a href="#!" class="collection-item">Page 13</a>
					<a href="#!" class="collection-item">Page 14</a>
      	</div>
			</div>-->

			<div class="col s12 m8 l9">
				<?php include_once $content; ?>
			</div>
		</div>


		<footer class="page-footer grey darken-4">
			<div class="container">
				<div class="row">
					<div class="col l6 s12">
						<h5 class="white-text">Classeur Numérique de Suivi des Apprentis</h5>

					</div>

				</div>
			</div>

			<div class="footer-copyright">
				<div class="container">
				Crée par <a class="blue-text text-lighten-3" href="">Jonathan BULACH</a> et <a class="blue-text text-lighten-3" href="">Matthias VAYTET</a> avec <a class="blue-text text-lighten-3" href="http://materializecss.com">Materialize</a>
				</div>
			</div>
		</footer>


		<!-- Scripts-->
		<script src="js/jquery.min.js"></script>
		<script src="js/materialize.js"></script>
		<script src="js/init.js"></script>
	</body>
</html>
