<h1>Ajouter un nouveau formateur</h1>

<!-- Après appui sur Ajouter renvoie vers validation_creation.php -->
<form action="?ctrl=formers&action=add" method="POST" />
	Rang<br/>
	<!-- Le checked permet de vérifier la valeur sur la base d'un booléen -->
<?php foreach($datas['ranks'] as $rank): ?>
	<input required type="radio" value='<?=$rank; ?>' name="rang"><?=ucfirst($rank); ?></input>
<?php endforeach; ?>
	<br/><br/>
	Nom</br>
	<!-- Champ de saisie qui sera enregistré dans la base de données -->
	<input required type="text" value="" name="nom" /></br></br>
	Mot de passe</br>
	<!-- Champ de saisie qui sera enregistré dans la base de données -->
	<input required type="password" value="" name="password" /></br></br>
	<input type="submit" name="ajouter" value="Ajouter" />
</form>