<?php

require_once("actions/Action.inc.php");

class SignUpAction extends Action {

	/**
	 * Traite les données envoyées par le formulaire d'inscription
	 * ($_POST['signUpLogin'], $_POST['signUpPassword'], $_POST['signUpPassword2']).
	 *
	 * Le compte est crée à l'aide de la méthode 'addUser' de la classe Database.
	 *
	 * Si la fonction 'addUser' retourne une erreur ou si le mot de passe et sa confirmation
	 * sont différents, on envoie l'utilisateur vers la vue 'SignUpForm' contenant
	 * le message retourné par 'addUser' ou la chaîne "Le mot de passe et sa confirmation
	 * sont différents.";
	 *
	 * Si l'inscription est validée, le visiteur est envoyé vers la vue 'MessageView' avec
	 * un message confirmant son inscription.
	 *
	 * @see Action::run()
	 */
	public function run() {
		/* TODO START */

			$user = 'root';
			$passwordBase = '';
			$db = 'sondages';
			$host = 'localhost';

			$url = "mysql:host=$host; dbname=$db";

			$connexion = new PDO($url, $user, $passwordBase); //connexion a la base de donnée


if (isset($_POST['inscription']) && $_POST['inscription'] == 'Créer mon compte') {
if (isset($_POST['signUpLogin']) && !empty($_POST['signUpLogin'])) {

	if(isset($_POST['signUpPassword']) && !empty($_POST['signUpPassword']) && isset($_POST['signUpPassword2']) && !empty($_POST['signUpPassword2'])) {
if (isset($_POST['signUpPassword']) == isset($_POST['signUpPassword2'])){
echo '<script type="text/javascript">alert(\'Inscription réussi !\');</script>';
$nick = $_POST['signUpLogin'];
$pass = $_POST['signUpPassword'];
$newask = $connexion->prepare("INSERT INTO users (`nickname`, `password`) VALUES('$nick', '$pass')");
$newask->execute();
}
else {
	echo '<script type="text/javascript">alert(\'Error : les MDP ne sont pas les mêmes !\');</script></br>';
}
	}
	else {
		echo '<script type="text/javascript">alert(\'Error_formulaire_non_complet_!\');</script></br>';
	}
}
}
		/* TODO END */

	}




	private function setSignUpFormView($message) {
		$this->setView(getViewByName("SignUpForm"));
		$this->getView()->setMessage($message);
	}

}


?>
