<?php

//gen

$rep= __DIR__ . '/../';
// liste des modules à inclure

//$dConfig['includes']= array('controleur/Validation.php');



//BD

$base="mysql:host=localhost;dbname=dbrakhedair";
$login="rakhedair";
$mdp="achanger";

//Vues

$vues['erreur']='vues/erreur.php';
$vues['homeList']='vues/homeList.php';
$vues['signUtilisateur']='vues/signUtilisateur.php';
$vues['navBar']='vues/navbar.php';
$vues['signup']='vues/signUp.php';
$vues['tacheX']='vues/tache.php';
$vues['editTache']='vues/editTache.php';


?>