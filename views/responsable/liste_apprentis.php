<div class="row">
	<a class="btn-floating btn-large waves-effect waves-light red left" href="?action=#"><i class="material-icons">close</i></a><h4>Liste des Apprentis</h4>
	<h5>
		Section : <?=strtoupper($datas['nom_section']); ?>
	</h5>
</div>

<?php foreach($datas['apprentis'] as $apprenti): ?>
  <div class="collection">
	   <a class="collection-item" href="?action=classeur&id=<?=$apprenti['id_utilisateur']; ?>"><?=$apprenti['nom_apprenti']; ?></a>
  </div>
<?php endforeach; ?>
