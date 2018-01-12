<?php 
	$former = $datas['former']; 
?>

<h1>Modifier les informations d'un formateur</h1>

<!-- Après appui sur Modifier renvoie vers validation_modification.php -->
<form action="?ctrl=formers&action=update" method="POST" />
	Rang</br></br>
	<input required type="hidden" value='<?=$former->getIdFormer(); ?>' name="id" />
	<!-- Vérifie quel rang est sélectionné -->
<?php foreach($datas['ranks'] as $rank): ?>
	<input required type="radio" value='<?=$rank; ?>' name="rang"<?php if($former->getRank() == $rank) echo ' checked'; ?>><?=ucfirst($rank); ?></input>
<?php endforeach; ?>
	<br/><br/>
	Nom</br>
	<!-- Champ de saisie qui sera enregistré dans la base de données -->
	<input required type="text" value="<?=$former->getName(); ?>" name="nom" /></br></br>
	Mot de passe</br>
	<input type="submit" name="modifier" value="Modifier" />
</form>