<div class="row">
	<h4>Liste des classeurs</h4>
	<h5>
		Tuteur : <?=ucfirst($datas['tuteur']['prenom']); ?> <?=strtoupper($datas['tuteur']['nom']); ?>
	</h5>
</div>

<div class="row">
<?php foreach($datas['cursus'] as $cursus): ?>
	<div class="collection">
		<a href="?action=classeur&id=<?=$cursus['id_classeur']; ?>" class="collection-item"><?=$cursus['annee_debut']; ?> - <?=$cursus['annee_fin']; ?></a>
	</div>
<?php endforeach; ?>
</div>