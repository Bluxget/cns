
<div class="row">
	<a class="btn-large  blue-grey darken-4 left" href="?action=#">ACCUEIL</a><h4>Liste des Apprentis</h4>
	<h5>
		Section : <?=strtoupper($datas['nom_section']); ?>
	</h5>
</div>

<?php foreach($datas['apprentis'] as $apprenti): ?>
  <div class="collection">
	   <a class="collection-item" href="?action=classeur&id=<?=$apprenti['id_utilisateur']; ?>"><?=$apprenti['nom_apprenti']; ?></a>
  </div>
<?php endforeach; ?>
