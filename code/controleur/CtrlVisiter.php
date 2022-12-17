<?php
class CtrlVisiter {

function __construct() {
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
	global $rep,$vues;
	$idTask=$_REQUEST['idTask'] ?? null;
	$idTaskVerif = Validation::validateInt($idTask);
	if(! ModelVisiteur::removeTask($idTaskVerif)){
		$dVueErreur['supperTache']="le tache n'appartient pas à vous";
	}

	$_COOKIE['path']="/home/list/task";
	$idList=$_REQUEST['idList'] ?? null;
	$idListeVerif = Validation::validateInt($idList);
	$dVue =  ModelVisiteur::getTachesPublic($idListeVerif);
	$listName =  $idList;
	require ($rep.$vues['tacheX']);

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
		global $rep,$vues;
		$error=false;
		if (empty($_POST['userName'])) {
			$dvueError['userNameEmpty'] = 'Il faut renseigné le userName ';
			$error=true;

		} else {
			$userName = $_POST['userName'];
		}

		if (empty($_POST['password'])) {
			$dvueError['paswordEmpty'] = 'Il faut renseigné le password ';
			$error=true;
		} else {
			$password = $_POST['password'];
		}
		if($error){
			require ($rep.$vues['signUtilisateur']);
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
		global $rep,$vues;
		$dErreurInscription=array();
		if (!Validation::validateMail($_POST['userMail'],$dErreurInscription)) {
			$error=true;
		} else {
			$userMail = $_POST['userMail'];
		}
		if (!Validation::validateId($_POST['userIdSignUp'],$dErreurInscription) ) {
			$error=true;
		} else {

			$userIdSignUp = $_POST['userIdSignUp'];
		}
		if (!Validation::validateString($_POST['userNameSignUp'],$dErreurInscription,'userNameSignUpEmpty','Il faut renseigné le nom')) {
			$error=true;
		} else {
			$userNameSignUp = $_POST['userNameSignUp'];
		}
		if (!Validation::validateString($_POST['paswordSignUp'],$dErreurInscription,'paswordSignUpEmpty','Il faut renseigné le password')) {
			$error=true;
		} else {
			$paswordSignUp = $_POST['paswordSignUp'];
			if (!Validation::validateString($_POST['paswordSignUpEquals'],$dErreurInscription,'paswordSignUpNotEquals','Il faut renseigné le passwordRetype') ) {
				$error=true;
			} else {
				$paswordSignUpEquals = $_POST['paswordSignUpEquals'];
				if($paswordSignUp != $paswordSignUpEquals){
					$error=true;
					$dErreurInscription['paswordSignUpNotEquals']="les password ne sont pas coherent";
				}

			}
		}
		if($error){
			require ($rep.$vues['signup']);
		}else{
			if(ModelUtilisateur::creationCompte($userIdSignUp, $userNameSignUp, $userMail, $paswordSignUpEquals)){
				header("LOCATION: index.php?action=connected");
			}

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
