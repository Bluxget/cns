<div class="row">
	<h4><?=$datas['page']['titre']; ?></h4>
</div>

<form action="?action=modifierpage&id=<?=$datas['page']['id_page']; ?>&id_apprenti=<?=$datas['id_apprenti']; ?>"  method="post">
	<div class="left row">
		<?=$datas['page']['contenu']; ?>
	</div>

	<div class="row">
		<div class="input-field col s12">
			<input id="submit" name="submit" type="submit" class="btn validate" value="Valider les modifications" />
		</div>
	</div>

	<div class="row col s12">
		<h6>Page <?=$datas['page']['position']; ?></h6>
	</div>
</form>

