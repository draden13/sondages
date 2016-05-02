<?php
require_once("views/templates/addsurveyform.inc.php");
require_once("model/Survey.inc.php");
require_once("model/Response.inc.php");
require_once("actions/Action.inc.php");

class AddSurveyAction extends Action {

	/**
	 * Traite les données envoyées par le formulaire d'ajout de sondage.
	 *
	 * Si l'utilisateur n'est pas connecté, un message lui demandant de se connecter est affiché.
	 *
	 * Sinon, la fonction ajoute le sondage à la base de données. Elle transforme
	 * les réponses et la question à l'aide de la fonction PHP 'htmlentities' pour éviter
	 * que du code exécutable ne soit inséré dans la base de données et affiché par la suite.
	 *
	 * Un des messages suivants doivent être affichés à l'utilisateur :
	 * - "La question est obligatoire.";
	 * - "Il faut saisir au moins 2 réponses.";
	 * - "Merci, nous avons ajouté votre sondage.".
	 *
	 * Le visiteur est finalement envoyé vers le formulaire d'ajout de sondage en cas d'erreur
	 * ou vers une vue affichant le message "Merci, nous avons ajouté votre sondage.".
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


		if (isset($_POST['postermsg']) && $_POST['postermsg'] == 'Poster le sondage') {
			if (isset($_POST['questionSurvey']) && !empty($_POST['questionSurvey'])) {

	 			if(isset($_POST['responseSurvey1']) && !empty($_POST['responseSurvey1']) && isset($_POST['responseSurvey2']) && !empty($_POST['responseSurvey2'])) {

	echo '<script type="text/javascript">alert(\'Sondage envoye !\');</script>';
	$owner = $_SESSION['nickname'];
	$ask = $_POST['questionSurvey'];
	$newask = $connexion->prepare("INSERT INTO surveys (`id`, `owner`, `question`) VALUES('', '$owner', '$ask')");
	$newask->execute();

				}
				else {
					echo '<script type="text/javascript">alert(\'Error_formulaire_non_complet_!\');</script></br>';
				}
			}
		}
		/* TODO END */
	}

	private function setAddSurveyFormView($message) {
		$this->setView(getViewByName("AddSurveyForm"));
		$this->getView()->setMessage($message, "alert-error");
	}

}

?>
