<form action="?action=connect" method="POST" class="col s12">
	<div class="row">
		<div class="input-field col s6">
			<input id="firstName" name="firstName" type="text" class="validate" required />
			<label for="firstName">Prénom</label>
		</div>
		<div class="input-field col s6">
			<input id="lastName" name="lastName" type="text" class="validate" required />
			<label for="lastName">Nom</label>
		</div>
	</div>
	<div class="row">
		<div class="input-field col s12">
			<input id="password" name="password" type="password" class="validate" required />
			<label for="password">Password</label>
		</div>
	</div>
	<div class="row">
		<div class="input-field col s12">
			<input id="submit" name="submit" type="submit" class="btn validate" value="Se connecter" />
		</div>
	</div>
</form>