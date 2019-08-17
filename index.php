<?php
session_start();
$titre="Connexion";
include("includes/identifiants.php");
include("includes/debut.php");
include("includes/menu.php");
echo '<p><i>Bienvenue sur lalala</i>';
?>

<?php
if (!isset($_POST['pseudo'])) //On est dans la page de formulaire
{
	echo '<form method="post" action="connexion.php">
	<fieldset>
	<legend>Connexion</legend>
	<p>
	<label for="pseudo">Pseudo :</label><input name="pseudo" type="text" id="pseudo" /><br />
	<label for="password">Mot de Passe :</label><input type="password" name="password" id="password" />
	</p>
	</fieldset>
	<p><input type="submit" value="Connexion" /></p></form>
	<a href="./register.php">Pas encore inscrit ? Eh bah bravo </a>

	</div>
	</body>
	</html>';
}
?>
<table border="0" width="100%">
<tr>
<td width="100%" align="center"><img src="lalala.png" alt=""></td>
</tr>
</table>
