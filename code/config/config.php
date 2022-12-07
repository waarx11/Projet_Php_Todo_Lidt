<?php

//gen

$rep= __DIR__ . '/../';
echo $rep;
// liste des modules à inclure

//$dConfig['includes']= array('controleur/Validation.php');



//BD

$base="mysql:host=localhost;dbname=dbnaverdier";
$login="naverdier";
$mdp="achanger";

//Vues

$vues['erreur']='vues/erreur.php';
$vues['vuephp1']='vues/vuephp1.php';
$vues['homeList']='vues/homeList.php';


?>