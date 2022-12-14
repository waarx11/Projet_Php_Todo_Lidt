<?php
class CtrlVisiter {

function __construct() {
	//$_SESSION['user']='rami';
	global $rep,$vues; // nécessaire pour utiliser variables globales
// on démarre ou reprend la session si necessaire (préférez utiliser un modèle pour gérer vos session ou cookies)

//debut

//on initialise un tableau d'erreur
	$dVueEreur = array ();
	try{
		$action=$_REQUEST['action'] ?? null;

		switch($action) {

	//pas d'action, on rinitialise 1er appel
		case NULL:
			$this->Reinit();
			break;
		case "connectionPage" :
			$this->connectionPage();
			break;
		case "signUpPage" :
			$this->signUpPage();
			break;
		case "tacheX" :
			$this->tacheX();
			break;
		case "tacheXDelet" :
			$this->tacheXDelet();
			break;

		case "ajoutList":
			require ($rep.$vues['homeList']);
			$this->listexInsert($nom,$visibilite,$description);
			break;

		case "tacheCheked":
			$this->tacheCheked();
			break;
		case "loginUser":
				$this->loginUser();
				break;

		case "creationCompte":
			require ($rep.$vues['signUp']);
			$this->creationCompte($userName,$password);
			break;

		default:
			$dVueEreur[] =	"Erreur d'appel php";
			require ($rep.$vues['vuephp1']);
			break;
	}

	} catch (PDOException $e)
	{
		//si erreur BD, pas le cas ici
		$dVueEreur[] =	"Erreur inattendue!!! ";
		require ($rep.$vues['erreur']);

	}
	catch (Exception $e2)
		{
		$dVueEreur[] =	$e2->getMessage();
		require ($rep.$vues['erreur']);
		}


	//fin
	exit(0);
}//fin constructeur


function Reinit() {
	global $rep,$vues; // nécessaire pour utiliser variables globales
	$dVue = ModelVisiteur::getPublicList();

	require ($rep.$vues['homeList']);
}
function connectionPage() {
	global $rep,$vues; // nécessaire pour utiliser variables globales
	require ($rep.$vues['signUtilisateur']);
}

function signUpPage() {
	global $rep,$vues; // nécessaire pour utiliser variables globales
	require ($rep.$vues['signup']);
}


function tacheX() {
	global $rep,$vues;
	$idList=$_REQUEST['idList'] ?? null;
	$idListeVerif = Validation::validateInt($idList);

	$dVue =  ModelVisiteur::getTachesPublic($idListeVerif);
	$listName =  $idList;
	require ($rep.$vues['tacheX']);
}

function checkedPrc($id){

	return ModelVisiteur::getCheckedPrc($id);
}

private function tacheXDelet()
{

	$idTask=$_REQUEST['idTask'] ?? null;
	$idTaskVerif = Validation::validateInt($idTask);
	ModelVisiteur::removeTask($idTaskVerif);
	$this->tacheX();

	//header.location; pour changer le location
}
	private function tacheCheked()
	{
		$idTask=$_REQUEST['idTask'] ?? null;
		$idTaskVerif = Validation::validateInt($idTask);
		ModelVisiteur::updateCheckTaskPublic($idTaskVerif);
		$idList=$_REQUEST['idList'] ?? null;
		header("LOCATION: index.php?action=tacheX&idList=".$idList);
		//$this->tacheX();
	}

	private function listexInsert($nom,$visibilite,$description)
	{
		global $rep,$vues; // nécessaire pour utiliser variables globales
		ModelVisiteur::createList();
	}


	private function loginUser()
	{
			$error=false;
			if (empty($_POST['userName'])) {
				$dVueEreur['userNameEmpty'] = 'Il faut renseigné le ';
				$error=true;

			} else {
				$userName = $_POST['userName'];
			}

			if (empty($_POST['password'])) {
				$dVueEreur['paswordEmpty'] = 'Il faut renseigné le ';
				$error=true;
			} else {
				$password = $_POST['password'];
			}
			if($error){
				$this->connectionPage();
			}else{
				if (ModelUtilisateur::login($userName, $password) == null) {
					$dVueEreur['loginResponse'] = "password or/and id are incorrect";
				}else{
					header("LOCATION: index.php?action=connected");
				}
			}


	}

//	private function creationCompte($userName,$password){
//		global $rep,$vues;
//		ModelVisiteur::
//	}


}//fin class
?>
