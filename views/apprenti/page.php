<div class="row">
	<h4><?=$datas['page']['titre']; ?></h4>
</div>

<form action="?action=modifierpage&id=<?=$datas['page']['id_page']; ?>"  method="post">
	<div class="section">
		<div class="left row">
			<?=$datas['page']['contenu']; ?>
		</div>
	</div>

	<div class="divider"></div>

	<div class="section">
		<div class="row">
			<div class="input-field">
				<input id="submit" name="submit" type="submit" class="btn validate" value="Valider les modifications" />
			</div>
		</div>

		<div class="row">
			<h6>Page <?=$datas['page']['position']; ?></h6>
		</div>
	</div>
</form>

