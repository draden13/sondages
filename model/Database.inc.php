<?php
require_once("model/Survey.inc.php");
require_once("model/Response.inc.php");

class Database {

	public $connection;


	/**
	 * Ouvre la base de données. Si la base n'existe pas elle
	 * est créée à l'aide de la méthode createDataBase().
	 */
	public function __construct() {
		$dbHost = "localhost";
		$dbBd = "sondages";
		$dbPass = "";
		$dbLogin = "root";
		$url = 'mysql:host='.$dbHost.';dbname='.$dbBd;
		//$url = 'sqlite:database.sqlite';
		$this->connection = new PDO($url, $dbLogin, $dbPass);
		if (!$this->connection) die("impossible d'ouvrir la base de données");
		$this->createDataBase();

	}


	/**
	 * Initialise la base de données ouverte dans la variable $connection.
	 * Cette méthode crée, si elles n'existent pas, les trois tables :
	 * - une table users(nickname char(20), password char(50));
	 * - une table surveys(id integer primary key auto_increment,
	 *						owner char(20), question char(255));
	 * - une table responses(id integer primary key auto_increment,
	 *		id_survey integer,
	 *		title char(255),
	 *		count integer);
	 */
	private function createDataBase() {
		/* TODO START */
		$dbHost = "localhost";
		$dbBd = "sondages";
		$dbPass = "";
		$dbLogin = "root";
		$url = 'mysql:host='.$dbHost.';dbname='.$dbBd;
		$connexion = new PDO($url, $dbLogin, $dbPass);

		$query_1 = $connexion->prepare("		CREATE TABLE IF NOT EXISTS users (
				 id integer primary key auto_increment, -- j'ai mis un id pour l'organisation de la table, plus facile a gerer--
				 nickname char(20),
				 password char(50)
			);");
		$query_1->execute();

		$query_2 = $connexion->prepare("		CREATE TABLE IF NOT EXISTS surveys (
				 id integer primary key auto_increment,
				 owner char(20),
				 question char(255)
			);");
		$query_2->execute();

		$query_3 = $connexion->prepare("		CREATE TABLE IF NOT EXISTS responses (
				 id integer primary key auto_increment,
				 id_survey integer,
				 title char(255),
				 count integer
			);");
		$query_3->execute();




		/* TODO END */
	}

	/**
	 * Vérifie si un pseudonyme est valide, c'est-à-dire,
	 * s'il contient entre 3 et 10 caractères et uniquement des lettres.
	 *
	 * @param string $nickname Pseudonyme à vérifier.
	 * @return boolean True si le pseudonyme est valide, false sinon.
	 */
	private function checkNicknameValidity($nickname) {
		/* TODO START */
		$dbHost = "localhost";
		$dbBd = "sondages";
		$dbPass = "";
		$dbLogin = "root";
		$url = 'mysql:host='.$dbHost.';dbname='.$dbBd;
		$connexion = new PDO($url, $dbLogin, $dbPass);



		/* TODO END */
	}

	/**
	 * Vérifie si un mot de passe est valide, c'est-à-dire,
	 * s'il contient entre 3 et 10 caractères.
	 *
	 * @param string $password Mot de passe à vérifier.
	 * @return boolean True si le mot de passe est valide, false sinon.
	 */
	private function checkPasswordValidity($password) {
		/* TODO START */

		/* TODO END */
	}

	/**
	 * Vérifie la disponibilité d'un pseudonyme.
	 *
	 * @param string $nickname Pseudonyme à vérifier.
	 * @return boolean True si le pseudonyme est disponible, false sinon.
	 */
	private function checkNicknameAvailability($nickname) {
		/* TODO START */

				$sql = 'SELECT nickname
						FROM ' . SQL_PREFIX . 'users
						WHERE LOWER(nickname) = \'' . Fsb::$db->escape(String::strtolower($nickname)) . '\'';
				$return = Fsb::$db->get($sql, 'nickname');

				return ($return);

		/* TODO END */
	}

	/**
	 * Vérifie qu'un couple (pseudonyme, mot de passe) est correct.
	 *
	 * @param string $nickname Pseudonyme.
	 * @param string $password Mot de passe.
	 * @return boolean True si le couple est correct, false sinon.
	 */
	public function checkPassword($nickname, $password) {
		/* TODO START */
		$dbHost = "localhost";
		$dbBd = "sondages";
		$dbPass = "";
		$dbLogin = "root";
		$url = 'mysql:host='.$dbHost.';dbname='.$dbBd;
		$connexion = new PDO($url, $dbLogin, $dbPass);
		$sql = "SELECT $nickname
						FROM ' . SQL_PREFIX . '$password
						WHERE LOWER($nickname) = \'' . Fsb::$connexion->escape(strtolower($nickname)) . '\'";
				$return = Fsb::$connexion->get($sql, $nickname);

				return ($return);



		/* TODO END */
	}

	/**
	 * Ajoute un nouveau compte utilisateur si le pseudonyme est valide et disponible et
	 * si le mot de passe est valide. La méthode peut retourner un des messages d'erreur qui suivent :
	 * - "Le pseudo doit contenir entre 3 et 10 lettres.";
	 * - "Le mot de passe doit contenir entre 3 et 10 caractères.";
	 * - "Le pseudo existe déjà.".
	 *
	 * @param string $nickname Pseudonyme.
	 * @param string $password Mot de passe.
	 * @return boolean|string True si le couple a été ajouté avec succès, un message d'erreur sinon.
	 */
	 public function addUser($nickname, $password) {
	    /* TODO START */
	      $dbHost = "localhost";
	     	$dbBd = "sondages";
	     	$dbPass = "";
	     	$dbLogin = "root";
	  $connexion = new PDO($url, $dbLogin, $dbPass);

		if (isset($_POST['inscription']) && $_POST['inscription'] == 'Créer mon compte') {
		if (isset($_POST['signUpLogin']) && !empty($_POST['signUpLogin'])) {

			if(isset($_POST['signUpPassword']) && !empty($_POST['signUpPassword']) && isset($_POST['signUpPassword2']) && !empty($_POST['signUpPassword2'])) {
		if (isset($_POST['signUpPassword']) == isset($_POST['signUpPassword2'])){
		echo '<script type="text/javascript">alert(\'Inscription réussi !\');</script>';
		$nick = $_POST['signUpLogin'];
		$pass = $_POST['signUpPassword'];
		$newask = $connexion->prepare("INSERT INTO users (`id`, `nickname`, `password`) VALUES('', '$nick', '$pass')");
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

	///     	$query_addUser = $connexion->prepare("INSERT INTO users (
	///              	nickname char(20),
	///              	password char(50)
	///         	);");
	     ///	$query_addUser->execute();

	  /* TODO END */
	       return true;
	     }

	/**
	 * Change le mot de passe d'un utilisateur.
	 * La fonction vérifie si le mot de passe est valide. S'il ne l'est pas,
	 * la fonction retourne le texte 'Le mot de passe doit contenir entre 3 et 10 caractères.'.
	 * Sinon, le mot de passe est modifié en base de données et la fonction retourne true.
	 *
	 * @param string $nickname Pseudonyme de l'utilisateur.
	 * @param string $password Nouveau mot de passe.
	 * @return boolean|string True si le mot de passe a été modifié, un message d'erreur sinon.
	 */
	public function updateUser($nickname, $password) {
		/* TODO START */



		/* TODO END */
	  return true;
	}

	/**
	 * Sauvegarde un sondage dans la base de donnée et met à jour les indentifiants
	 * du sondage et des réponses.
	 *
	 * @param Survey $survey Sondage à sauvegarder.
	 * @return boolean True si la sauvegarde a été réalisée avec succès, false sinon.
	 */
	public function saveSurvey($survey) {
		/* TODO START */

		$this->connection->beginTransaction();
		$query = $this->connection->prepare("INSERT INTO surveys(owner,question)".
		"VALUES (?,?)");
		if ($query===false) { $this->connection->rollback(); return false; }
		$r = $query->execute(array($survey->getOwner(), $survey->getQuestion()));
		if ($r === false) { $this->connection->rollback(); return false; }
		$id = $this->connection->lastInsertId();
		$survey->setId($id);
		$responses = &$survey->getResponses();
		foreach ($responses as &$response) {
		if ($this->saveResponse($response)===false) {
		$this->connection->rollback(); return false;
		}
		}
		$this->connection->commit(); return true;


		/* TODO END */

	}

	/**
	 * Sauvegarde une réponse dans la base de donnée et met à jour son indentifiant.
	 *
	 * @param Response $response Réponse à sauvegarder.
	 * @return boolean True si la sauvegarde a été réalisée avec succès, false sinon.
	 */
	private function saveResponse($response) {
		/* TODO START */
		/* TODO END */
		return true;
	}

	/**
	 * Charge l'ensemble des sondages créés par un utilisateur.
	 *
	 * @param string $owner Pseudonyme de l'utilisateur.
	 * @return array(Survey)|boolean Sondages trouvés par la fonction ou false si une erreur s'est produite.
	 */
	public function  loadSurveysByOwner($owner) {
		/* TODO START */

		$surveys = R::find('survey', 'owner = ?', array($_SESSION['id']));
		foreach ($surveys as &$survey) {
		$total = 0;
		foreach ($survey->ownResponse as $r)
		$total += $r->count;
		if ($total===0) {
		foreach ($survey->ownResponse as &$r)
		$r->percentage = 0;
		} else {
		foreach ($survey->ownResponse as &$r)
		$r->percentage = (100*$r->count)/$total;
		}
		}

		/* TODO END */
	}

	/**
	 * Charge l'ensemble des sondages dont la question contient un mot clé.
	 *
	 * @param string $keyword Mot clé à chercher.
	 * @return array(Survey)|boolean Sondages trouvés par la fonction ou false si une erreur s'est produite.
	 */
	public function loadSurveysByKeyword($keyword) {
		/* TODO START */
		/* TODO END */
	}


	/**
	 * Enregistre le vote d'un utilisateur pour la réponse d'identifiant $id.
	 *
	 * @param int $id Identifiant de la réponse.
	 * @return boolean True si le vote a été enregistré, false sinon.
	 */
	public function vote($id) {
		/* TODO START */
		/* TODO END */
	}

	/**
	 * Construit un tableau de sondages à partir d'un tableau de ligne de la table 'surveys'.
	 * Ce tableau a été obtenu à l'aide de la méthode fetchAll() de PDO.
	 *
	 * @param array $arraySurveys Tableau de lignes.
	 * @return array(Survey)|boolean Le tableau de sondages ou false si une erreur s'est produite.
	 */
	private function loadSurveys($arraySurveys) {
		$surveys = array();
		/* TODO START */
		/* TODO END */
		return $surveys;
	}

	/**
	 * Construit un tableau de réponses à partir d'un tableau de ligne de la table 'responses'.
	 * Ce tableau a été obtenu à l'aide de la méthode fetchAll() de PDO.
	 *
	 * @param Survey $survey Le sondage.
	 * @param array $arraySurveys Tableau de lignes.
	 * @return array(Response)|boolean Le tableau de réponses ou false si une erreur s'est produite.
	 */
	private function loadResponses($survey, $arrayResponses) {
		$responses = array();
		/* TODO START */
		/* TODO END */
		return $responses;
	}

}

?>
