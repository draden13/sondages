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

$nick = $_POST['signUpLogin'];
//$sql = 'SELECT * FROM users WHERE nickname="'.$_POST['signUpLogin'].'"';
$pass = $_POST['signUpPassword'];
//if ($sql !== $nick){
//	$this->setMessageView("Ce pseudo est déjà pris.", "alert-error");
//}
//else {
$newask = $connexion->prepare("INSERT INTO users (`id`, `nickname`, `password`) VALUES('', '$nick', '$pass')");
$newask->execute();
$_SESSION['nickname'] = $_POST['signUpLogin'];
$this->setMessageView("Votre inscription a été enregistré.", "alert-success");

//}
}
else {
	$this->setMessageView("Les mots de passes ne sont pas identiques", "alert-error");
}
	}
	else {
		$this->setMessageView("Le formulaire est incomplet !", "alert-error");
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
