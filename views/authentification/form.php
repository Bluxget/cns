<form action="?ctrl=authentification&action=connect" method="POST">
	<label for="firstName">Prénom :</label>
	<input required type="text" name="firstName" placeholder ="ex: aiden" />
	<label for="lastName">Nom :</label>
	<input required type="text" name="lastName" placeholder ="ex: jones" />
	<br /><br />
	<label for="password">Mot de passe :</label>
	<input required type="password" name="password" />
	<br /><br />
	<input type="submit" value="Se connecter" />
</form>