<div class="row">
	<a class="btn-large  blue-grey darken-4 left" href="?action=#">ACCUEIL</a><h4>Liste des Pages</h4>
	<h5>
	<?=strtoupper($datas['nom_apprenti']); ?>

	</h5>
</div>

<div class="row">
<?php foreach($datas['pages'] as $page): ?>
	<div class="collection">
		<a href="?action=page&id=<?=$page['id_page'];?>" class="collection-item"><span class="badge"><?=$page['position']; ?></span><?=$page['titre']; ?></a>
	</div>
<?php endforeach; ?>
</div>
