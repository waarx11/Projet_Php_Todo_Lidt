<?php
class CtrlVisiter {

function __construct() {
	global $rep,$vues;
	$dVueEreur = array ();
	try{
		$action=$_REQUEST['action'] ?? null;

		switch($action) {

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

		case "tacheXUpdate":
			error_reporting(E_ERROR | E_PARSE);

			$this->tacheXUpdate();
			break;
		case "tacheXEdit" :
			$this->tacheXEdit();
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
			require ($rep.$vues['erreur']);
			break;
	}

	} catch (PDOException $e)
	{
		$dVueEreur[] =	"Erreur inattendue!!! ";
		require ($rep.$vues['erreur']);
	}
	catch (Exception $e2)
	{
		$dVueEreur[] =	$e2->getMessage();
		require ($rep.$vues['erreur']);
	}
	exit(0);
}


function Reinit(){
	global $rep,$vues;
	$_COOKIE['path']="/home";
	$dVue = ModelVisiteur::getPublicList();
	require ($rep.$vues['homeList']);
}

function connectionPage() {
	global $rep,$vues;
	$_COOKIE['path']="/home/login";
	require ($rep.$vues['signUtilisateur']);
}

function signUpPage() {
	global $rep,$vues;
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

}

	private function tacheXEdit()
	{
		global $rep,$vues;

		$idTask=$_REQUEST['idTask'] ?? null;
		$idTaskVerif = Validation::validateInt($idTask);
		$task= ModelVisiteur::taskById($idTaskVerif);
		if($task==null){
			$dVueErreur['supperTache']="le tache n'exsite pas ou n'appartient pas à vous";
			$_COOKIE['path']="/home/list/task";
			$idList=$_REQUEST['idList'] ?? null;
			$idListeVerif = Validation::validateInt($idList);
			$dVue =  ModelVisiteur::getTachesPublic($idListeVerif);
			$listName =  $idList;
			require ($rep.$vues['tacheX']);
		}else{
			$_COOKIE['path']="/home/list/task/edit";
			$idList=$_REQUEST['idList'] ?? null;
			$idListeVerif = Validation::validateInt($idList);
			require ($rep.$vues['editTache']);
		}
	}

	private function tacheXUpdate()
	{
		global $rep,$vues;
		$error=false;
		$idTask=$_REQUEST['idTask'] ?? null;
		$idTaskVerif = Validation::validateInt($idTask);

		if (empty($_POST['tacheName']) ) {
			$dVueEreur['tacheName'] = 'Il faut renseigné le nom de la tache ';
			$error=true;
		} else {
			$tacheName = Validation::cleanString($_POST['tacheName']);
		}

		if (empty($_POST['tachePriorite']) ) {
			$dVueEreur['tachePriorite'] = 'Il faut renseigné le priorité ';
			$error=true;
		} else {
			if($_POST['tachePriorite']<=0  ){
				$dVueEreur['tachePriorite'] = "le proproité doit être postive";
				$error=true;
			}else{
				$tachePriorite = $_POST['tachePriorite'];
			}
		}
		if($error) {
			$_COOKIE['path']="/home/list/task/edit";
			$listName=$_POST['tacheListe'];
			$task= ModelVisiteur::taskById($idTaskVerif);
			require ($rep.$vues['editTache']);
		}

		else{
			$tacheRepete=$_POST['tacheRepete'];
			if(ModelVisiteur::updateTask($idTaskVerif,$tacheName,$tacheRepete ?? false,$tachePriorite)){
				header("LOCATION:"."index.php?action=tacheX&idList=".$_REQUEST['idList']);
			}
			else{
				$task= ModelVisiteur::taskById($idTaskVerif);
				$listName=$_POST['tacheListe'];
				require ($rep.$vues['editTache']);
			}

		}

	}

	private function tacheCheked()
	{
		$idTask=$_REQUEST['idTask'] ?? null;
		$idTaskVerif = Validation::validateInt($idTask);
		ModelVisiteur::updateCheckTaskPublic($idTaskVerif);
		$idList=$_REQUEST['idList'] ?? null;
		header("LOCATION: index.php?action=tacheX&idList=".$idList);
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
			else{
				$dErreurInscription['userIdSignUpEmpty']='Id already existe';
				require ($rep.$vues['signup']);
			}
		}
	}

	private function tacheXAdd()
	{
		global $rep,$vues;
		if (empty($_POST['tacheName']) ) {
			$dVueEreur['tacheName'] = 'Il faut renseigné le nom de la tache ';
			$error=true;
		} else {
			$tacheName = Validation::cleanString($_POST['tacheName']);
		}

		if (empty($_POST['tacheYear']) ) {
			$dVueEreur['tacheYear'] = "Il faut renseigné l'anne de la tache";
			$error=true;
		} else {
			if($_POST['tacheYear']<0){
				$dVueEreur['tacheYear'] = "l'anné doit etre positive";
				$error=true;
			}else{
				$tacheYear = $_POST['tacheYear'];
			}
		}

		if (empty($_POST['tacheDay']) ) {
			$dVueEreur['tacheDay'] = 'Il faut renseigné le jour';
			$error=true;
		}else {
			if($_POST['tacheDay']<=0 ||$_POST['tacheDay']>31  ){
				$dVueEreur['tacheDay'] = "le jour doit etre positive et plus petit que 31";
				$error=true;
			}else{
				$tacheDay = $_POST['tacheDay'];
			}
		}

		if (empty($_POST['tacheMonth'])  ) {
			$dVueEreur['tacheMonth'] = 'Il faut renseigné le mois';
			$error=true;
		} else {
			if($_POST['tacheMonth']<=0 ||$_POST['tacheMonth']>12  ){
				$dVueEreur['tacheMonth'] = "le jour doit etre positive et plus petit que 31";
				$error=true;
			}else{
				$tacheMonth = $_POST['tacheMonth'];
			}
		}

		if (empty($_POST['tacheListe']) ) {
			$dVueEreur['tacheListe'] = 'Il faut renseigné le liste ';
			$error=true;
		} else {
			$tacheListe = $_POST['tacheListe'];
		}

		if (empty($_POST['tachePriorite']) ) {
			$dVueEreur['tachePriorite'] = 'Il faut renseigné le priorité ';
			$error=true;
		} else {
			if($_POST['tachePriorite']<=0  ){
			$dVueEreur['tachePriorite'] = "le proproité doit être postive";
			$error=true;
			}else{
				$tachePriorite = $_POST['tachePriorite'];
			}
		}

		if($error) {
			$_COOKIE['path']="/home/list/task";
			$listName=$_POST['tacheListe'];
			$dVue =  ModelVisiteur::getTachesPublic($listName);
			require ($rep.$vues['tacheX']);
		}
		else{
			$tacheDateFin=$tacheYear."-".$tacheMonth."-".$tacheDay;
			$tacheRepete=$_POST['tacheRepete'];
			ModelVisiteur::ajoutTache(new TacheModal($tacheName,$tacheDateFin,$tacheRepete ?? false,$tachePriorite,$_SESSION['user'] ?? null,$tacheListe));
			header("LOCATION:".$_POST['pageAct']);
		}

	}


}
?>
