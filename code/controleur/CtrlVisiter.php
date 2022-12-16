<?php
class CtrlVisiter {

function __construct() {
	//$_SESSION['user']='rami';
	global $rep,$vues; // nécessaire pour utiliser variables globales
// on démarre ou reprend la session si necessaire (préférez utiliser un modèle pour gérer vos session ou cookies)

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

		case "tacheXAdd" :
			$this->tacheXAdd();
			break;

		case "tacheXDelet" :
			$this->tacheXDelet();
			break;

		case "tacheCheked":
			$this->tacheCheked();
			break;

		case "loginUser":
			$this->loginUser();
			break;

		case "signUpUser":
			$this->signUpUser();
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
	$_COOKIE['path']="/home";
	$dVue = ModelVisiteur::getPublicList();

	require ($rep.$vues['homeList']);
}
function connectionPage() {
	global $rep,$vues; // nécessaire pour utiliser variables globales
	$_COOKIE['path']="/home/login";
	require ($rep.$vues['signUtilisateur']);
}

function signUpPage() {
	global $rep,$vues; // nécessaire pour utiliser variables globales
	$_COOKIE['path']="/home/signup";

	require ($rep.$vues['signup']);
}

function tacheX() {
	global $rep,$vues;
	$_COOKIE['path']="/home/list/task";
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

	private function signUpUser(){
		$error=false;
		if (empty($_POST['userMail']) || !filter_var($_POST['userMail'],FILTER_VALIDATE_EMAIL)) {
			$dVueEreur['userMailInvalide'] = 'Il faut renseigné le ';
			$error=true;
		} else {
			$userMail = $_POST['userMail'];
		}

		if (empty($_POST['userIdSignUp'])) {
			$dVueEreur['userIdSignUpEmpty'] = 'Il faut renseigné le ';
			$error=true;

		} else {
			$userIdSignUp = $_POST['userIdSignUp'];
		}

		if (empty($_POST['userNameSignUp'])) {
			$dVueEreur['userNameSignUpEmpty'] = 'Il faut renseigné le ';
			$error=true;

		} else {
			$userNameSignUp = $_POST['userNameSignUp'];
		}

		if (empty($_POST['paswordSignUp'])) {
			$dVueEreur['paswordSignUpEmpty'] = 'Il faut renseigné le ';
			$error=true;
		} else {
			$paswordSignUp = $_POST['paswordSignUp'];
		}

		if (empty($_POST['paswordSignUpEquals']) && $_POST['paswordSignUpEquals'] != $_POST['paswordSignUp']) {
			$dVueEreur['paswordSignUpNotEquals'] = 'Il faut renseigné le ';
			$error=true;
		} else {
			$paswordSignUpEquals = $_POST['paswordSignUpEquals'];
		}
		if($error){
			$this->signUpPage();
		}else{
			ModelUtilisateur::creationCompte($userIdSignUp, $userNameSignUp, $userMail, $paswordSignUpEquals);
			header("LOCATION: index.php?action=connected");
				
//			}
//			else{
//				echo 'hy';
//				$dVueEreur['signUpResponse'] = "Impossible de crée le compte utilisateur";
//			}
		}
	}

	private function tacheXAdd()
	{
		if (empty($_POST['tacheName']) ) {
			$dVueEreur['tacheName'] = 'Il faut renseigné le ';
			$error=true;
		} else {
			$tacheName = $_POST['tacheName'];
		}
		if (empty($_POST['tacheYear']) ) {
			$dVueEreur['tacheYear'] = 'Il faut renseigné le ';
			$error=true;
		} else {
			$tacheYear = $_POST['tacheYear'];
		}
		if (empty($_POST['tacheDay']) ) {
			$dVueEreur['tacheDay'] = 'Il faut renseigné le ';
			$error=true;
		} else {
			$tacheDay = $_POST['tacheDay'];
		}
		if (empty($_POST['tacheMonth']) ) {
			$dVueEreur['tacheMonth'] = 'Il faut renseigné le ';
			$error=true;
		} else {
			$tacheMonth = $_POST['tacheMonth'];
		}
		$tacheDateFin=$tacheYear."-".$tacheMonth."-".$tacheDay;
		if (empty($_POST['tacheListe']) ) {
			$dVueEreur['tacheListe'] = 'Il faut renseigné le ';
			$error=true;
		} else {
			$tacheListe = $_POST['tacheListe'];
		}

		if (empty($_POST['tachePriorite']) ) {
			$dVueEreur['tachePriorite'] = 'Il faut renseigné le ';
			$error=true;
		} else {
			$tachePriorite = $_POST['tachePriorite'];
		}

		if (empty($_POST['tacheRepete']) ) {
			$dVueEreur['tacheRepete'] = 'Il faut renseigné le ';
			$_POST['tacheRepete']=false;
		} else {
			$tacheRepete = $_POST['tacheRepete'];
		}

		ModelVisiteur::ajoutTache(new TacheModal($tacheName,$tacheDateFin,$tacheRepete ?? false,$tachePriorite,$_SESSION['user'] ?? null,$tacheListe));
		header("LOCATION:".$_POST['pageAct']);


	}


}//fin class
?>
