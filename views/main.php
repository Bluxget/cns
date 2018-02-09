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
					<?php if($menu): ?><a href="#" data-activates="slide-out" class="button-collapse show-on-large"><i class="material-icons">menu</i></a><?php endif; ?>
					<a id="logo-container" href="index.php" class="brand-logo center">CNS - <?=$this->getTitle(); ?></a>
				</div>
			</nav>
		</div>

	<?php if($menu): ?>
		<?php if(isset($datas['pages'])): ?>
		<ul id="side_pages_classeur" class="dropdown-content">
			<?php foreach($datas['pages'] as $page): ?>
			<li><a href="?action=page&id=<?=$page['id_page']; ?>" class="truncate"><?=$page['position']; ?> - <?=$page['titre']; ?></a></li>
			<?php endforeach; ?>
			<li class="divider"></li>
		</ul>
		<?php endif; ?>

		<ul id="slide-out" class="side-nav">
			<li>
				<div class="user-view blue-grey darken-4">
					<h2><a href="#!name"><span class="white-text name"><?=ucfirst($user->getPrenom()); ?> <?=ucfirst($user->getNom()); ?></span></a></h2>
					<a href="#!email"><span class="white-text email"><!--mail@exemple.fr--></span></a>
				</div>
			</li>
			<li><a href="?action=disconnect">Deconnexion</a></li>
			<li class="divider"></li>
			<li><a href="index.php">Classeur</a></li>
			<li><a class="dropdown-button" href="#!" data-activates="side_pages_classeur">Pages<i class="material-icons right">arrow_drop_down</i></a></li>
		</ul>
	<?php endif; ?>

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
	<?php if(isset($datas['page'])): ?>
		<script>
			Materialize.toast('Survolez les zones de texte pour voir les commentaires des formateurs', 8000);
		</script>
	<?php endif; ?>
	</body>
</html>
