<div class="row">
	<h4>Pages du classeur</h4>
	<h5>
		Tuteur : <?=ucfirst($datas['tuteur']['prenom']); ?> <?=strtoupper($datas['tuteur']['nom']); ?>
	</h5>
</div>

<div class="row">
<?php foreach($datas['pages'] as $page): ?>
	<div class="collection">
		<a href="?action=page&id=<?=$page['id_page']; ?>" class="collection-item"><span class="badge"><?=$page['position']; ?></span><?=$page['titre']; ?></a>
	</div>
<?php endforeach; ?>
</div>