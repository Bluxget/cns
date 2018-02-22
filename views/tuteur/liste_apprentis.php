
<div class="row">
	<h4>Liste des Apprentis</h4>
</div>

<?php foreach($datas['apprentis'] as $apprenti): ?>
  <div class="collection">
	   <a class="collection-item" href="?action=classeur&id=<?=$apprenti['id_utilisateur']; ?>"><?=$apprenti['prenom']; ?> <?=$apprenti['nom']; ?></a>
  </div>
<?php endforeach; ?>
