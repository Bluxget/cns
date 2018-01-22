<h1>Liste des classeurs</h1>

<?php foreach($datas['classeurs'] as $classeur): ?>
	<div class="row">
		<div class="col s12 m5">
			<div class="card-panel teal">
				<span class="white-text"><?=$classeur->getCursus(); ?>
				</span>
			</div>
		</div>
	</div>
<?php endforeach; ?>
