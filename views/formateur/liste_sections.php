<h4>Liste des sections</h4>

<?php foreach($datas['section'] as $section): ?>
  <div class="collection">
	   <a class="collection-item" href="?action=apprentis&id=<?=$section['id_section']; ?>"><?=$section['nom_section']; ?></a>
  </div>
<?php endforeach; ?>
