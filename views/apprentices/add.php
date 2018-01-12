<script>

</script>

<style>

</style>

<h1>Ajouter un nouvel apprenti</h1>

<!-- Après appui sur Ajouter renvoie vers validation_creation.php -->
<form action="?ctrl=apprentices&action=add" method="POST" />
	Option<br/>
	<!-- Le checked permet de vérifier la valeur sur la base d'un booléen -->
<?php foreach($datas['options'] as $option): ?>
	<input required type="radio" value='<?=$option->getIdOption(); ?>' name="option"><?=$option->getName(); ?></input>
<?php endforeach; ?>
	<br/><br/>
	Nom</br>
	<!-- Champ de saisie qui sera enregistré dans la base de données -->
	<input required type="text" value="" name="nom" /></br></br>
	Prénom</br>
	<!-- Champ de saisie qui sera enregistré dans la base de données -->
	<input required type="text" value="" name="prenom" /></br></br>
	Adresse mail</br>
	<!-- Champ de saisie qui sera enregistré dans la base de données -->
	<input required type="mail" value="" name="email" /></br></br>
	<input required type="submit" name="ajouter" value="Ajouter" />
</form>