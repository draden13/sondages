<?php
require_once("actions/Action.inc.php");

class LoginAction extends Action {


	/**
	 * Traite les données envoyées par le visiteur via le formulaire de connexion
	 * (variables $_POST['nickname'] et $_POST['password']).
	 * Le mot de passe est vérifié en utilisant les méthodes de la classe Database.
	 * Si le mot de passe n'est pas correct, on affiche le message "Pseudo ou mot de passe incorrect."
	 * Si la vérification est réussie, le pseudo est affecté à la variable de session.
	 *
	 * @see Action::run()
	 */

	public function run() {
  	/* TODO START */


		if (isset($_POST['connexionConnexion']) && $_POST['connexionConnexion'] == 'Connexion') {
if ((isset($_POST['nickname']) && !empty($_POST['nickname'])) && (isset($_POST['password']) && !empty($_POST['password']))) {

 $user = 'root';
 $password = '';
 $db = 'sondages';
 $host = 'localhost';
 $port = 3306;
 $link = mysql_connect("$host:$port", $user, $password);
 $db_selected = mysql_select_db( $db,  $link);

// on teste si une entrée de la base contient ce couple login / pass
$sql = 'SELECT count(*) FROM users WHERE nickname="'.$_POST['nickname'].'" AND password="'.$_POST['password'].'"';
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
$data = mysql_fetch_array($req);

mysql_free_result($req);
mysql_close();

// si on obtient une réponse, alors l'utilisateur est un membre
if ($data[0] == 1) {
 session_start();
 $_SESSION['nickname'] = $_POST['nickname'];
 header('Location: index.php?action=Default');
 exit();
}
// si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login, soit dans son mot de passe
elseif ($data[0] == 0) {
 echo '<script type="txt/javascript">alert(\'Compte non reconnu.\');</script>';
}
// sinon, alors la, il y a un gros problème :)
else {
 echo '<script type="txt/javascript">alert(\'Probème dans la base de données : plusieurs membres ont les mêmes identifiants de connexion.\');</script>)';
}
}
else {
echo '<script type="txt/javascript">alert(\'Au moins un des champs est vide.\');</script>';
}
}


  	/* TODO END */
	}

	}
?>
