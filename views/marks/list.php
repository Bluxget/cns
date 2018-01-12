<script>

</script>

<style>

</style>

<h1>Noter un apprenti du CFAI84</h1>

<form action="?ctrl=marks&action=ajouter" method="post">

	<h3>choix de l'épreuve</h3>
	<table>
		
		<tr>
			<td class="whiteStyle">Choix de l'épreuve</td>
			<td class="whiteStyle"><label>E4</label><input required type="radio" name="idTest" value="1"></td>
			<td class="whiteStyle"><label>E6</label><input required type="radio" name="idTest" value="2"></td>
		</tr>
		
	</table>
	
	<hr/>
	
	<h3>Renseignements</h3>
	
	<input required type="number" name="idApprentice" placeholder="numéro candidat"/>
	
	<center><h3>Note Finale</h3>
	<label><input required type="number" step="0.01" min="0" max="20" name="mark"/> /20</label></center>
		
	<hr/>
		
	<h3>Commentaires</h3>
	<textarea name="comment"></textarea>
	
	<center><input required type="submit" name="validateMark" value="Valider"/></center>
	
</form>

<h1>Liste des notes des apprentis du CFAI84</h1>

<table>
	<tr>
		<th>id apprenti</th>
		<th>id formateur</th>
		<th>id test</th>
		<th>note</th>
		<th>commentaire</th>
		<th>suppression</th>
	</tr>

<?php foreach($datas['marks'] as $mark): ?>
	<tr>
		<td><?=$mark->getIdApprentice(); ?></td>
		<td><?=$mark->getIdFormer(); ?></td>
		<td><?=$mark->getIdTest(); ?></td>
		<td><?=$mark->getMark(); ?></td>
		<td><?=$mark->getComment(); ?></td>
		<td>
			<!-- Bouton supprimer note, redirige vers méthode supprimer -->
			<form action="?ctrl=marks&action=supprimer" method="POST">
			<input required type="hidden" value='<?=$mark->getIdApprentice(); ?>' name="id_apprentice" />
			<input required type="hidden" value='<?=$mark->getIdFormer(); ?>' name="id_former" />
			<input type="image" src="contents/img/supprimer.png" width="50" height="50" />
			</form>
		</td>
	</tr>
<?php endforeach; ?>

</table>