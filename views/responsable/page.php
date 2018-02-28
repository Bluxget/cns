<div class="row">
	<h4><?=$datas['page']['titre']; ?></h4>
</div>

<form action="?action=modifierpage&id=<?=$datas['page']['id_page']; ?>"  method="post">
	<div class="left row">
		<?=$datas['page']['contenu']; ?>
	</div>

	<div class="row col s12">
		<h6>Page <?=$datas['page']['position']; ?></h6>
	</div>
</form>
