<h1>Liste classeur</h1>
<?php foreach($datas['cursus'] as $cursus): ?>
	<a class="waves-effect waves-light btn" href="?action=classeur&id=<?=$cursus['id_cursus']; ?>"><?=$cursus['annee_debut']; ?> - <?=$cursus['annee_fin']; ?></a>
<?php endforeach; ?>