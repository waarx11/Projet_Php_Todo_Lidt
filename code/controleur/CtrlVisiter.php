<?php
class CtrlVisiter {

function __construct() {
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
		case "tacheX" :
			$idList=$_REQUEST['idList'] ?? null;
			$idListeVerif = Validation::validateInt($idList);
			$this->tacheX($idListeVerif);
			break;
		case "tacheXDelet" :
			$idTask=$_REQUEST['idTask'] ?? null;
			$idTaskVerif = Validation::validateInt($idTask);
			$this->tacheXDelet($idTaskVerif);
			break;

		case "ajoutList":
			require ($rep.$vues['homeList']);
			$this->listexInsert($nom,$visibilite,$description);

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
	//appelle modelle il valid ce que le gate way donne
	$dVue = array (
		'nom' => "",
		'age' => 0,
		);
		require ($rep.$vues['signUtilisateur']);
}


function tacheX($idList) {
	global $rep,$vues; // nécessaire pour utiliser variables globales
	//appelle modelle il valid ce que le gate way donne
	$dVue =  ModelVisiteur::getTachesPublic($idList);
	$listName =  $idList;
	require ($rep.$vues['tacheX']);
}

	private function tacheXDelet($idTask)
	{
		global $rep,$vues; // nécessaire pour utiliser variables globales
		//appelle modelle il valid ce que le gate way donne
		//$_server pour avoir le lien
		ModelVisiteur::removeTask($idTask);
		//header.location; pour changer le location
	}

	private function listexInsert($nom,$visibilite,$description)
	{
		global $rep,$vues; // nécessaire pour utiliser variables globales
		ModelVisiteur::createList();
	}


function ValidationFormulaire(array $dVueEreur) {
	global $rep,$vues;

	//si exception, ca remonte !!!
	$nom=$_POST['txtNom']; // txtNom = nom du champ texte dans le formulaire
	$age=$_POST['txtAge'];
	Validation::val_form($nom,$age,$dVueEreur);

	$model = new Simplemodel();
	$data=$model->get_data();

	$dVue = array (
		'nom' => $nom,
		'age' => $age,
			'data' => $data,
	);
		require ($rep.$vues['vuephp1']);
}

}//fin class
?>
