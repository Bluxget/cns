<!DOCTYPE html>

<html>
	<head>
		<title>ANNA - <?=$this->getTitle(); ?></title>
		<meta charset="utf-8" />
		<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
		<link rel="shortcut icon" href="img/favicon.png" type="image/png" />
		<link rel="apple-touch-icon" href="img/favicon.png" />
		<link rel="stylesheet" type="text/css" href="contents/css/main.css" />

		<script>
			function navDisplay()
			{
				if(document.getElementById('nav-ul').style.visibility == 'visible')
				{
					document.getElementById('nav-ul').style.visibility = 'hidden';
					document.getElementById('nav-button').innerHTML = '&#9650;';
				}
				else
				{
					document.getElementById('nav-ul').style.visibility = 'visible';
					document.getElementById('nav-button').innerHTML = '&#9660;';
				}
			}
		</script>
	</head>

	<body>
		<header>
			HEADER
		</header>

		<nav>
			<ul id="nav-ul">
				<li><a href="#">Test</a></li>
				<li><a href="#">Test</a></li>
				<li id="nav-ul-li-center"></li>
				<li><a href="#">Test</a></li>
				<li><a href="#">Test</a></li>
			</ul>
			 
			<button id="nav-button" onclick="navDisplay();">&#9650;</button>
		</nav>

		<main>
			<?php include_once $content; ?>
		</main>

		<footer>
			2017 &copy; ANNA
		</footer>
	</body>
</html>
