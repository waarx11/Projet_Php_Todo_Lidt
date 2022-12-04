<?php

class Validation {

static function val_action($action) {

if (!isset($action)) {
throw new Exception('pas d\'action');
    //on pourrait aussi utiliser
//$action = $_GET['action'] ?? 'no';
    // This is equivalent to:
    //$action =  if (isset($_GET['action'])) $action=$_GET['action']  else $action='no';
}
}

    static function val_form(string &$nom, string &$age, array &$dVueEreur) {

        if (!isset($nom)||$nom=="") {
            $dVueEreur[] =	"pas de nom";
            $nom="";
        }

        if ($nom != filter_var($nom, FILTER_SANITIZE_STRING))
        {
            $dVueEreur[] =	"testative d'injection de code (attaque sécurité)";
            $nom="";

        }

        if (!isset($age)||$age==""||!filter_var($age, FILTER_VALIDATE_INT)) {
            $dVueEreur[] =	"pas d'age ";
            $age=0;
        }

    }

    public static function validateInt(string $int){
        if(filter_var($int, FILTER_SANITIZE_NUMBER_INT) != $int) throw new Exception("Le nombre '".$int."' n'est pas valide.");
        return $int;
    }

    public static function validateUser(string $title){ //sert pour les taches et les listes
        if ($title == NULL) {
            throw new Exception("Le titre ne peut être vide");
        } else {
            if (!preg_match('/[a-zA-Z0-9].{4,50}/', $title)) {
                throw new Exception("Le titre '".$title."' n'est pas valide. Le titre doit contenir au moins 5 caractère, et doit commencer par une lettre ou un chiffre.");
            }
            return Validation::validateString($title);
        }
    }

    /* Fonction de validation du nom avec 1 caractère minimum et 25 maximum retourne la chaine filtrée */
    public static function validateName(string $username){
        if ($username == NULL){
            throw new Exception("Le nom ne peut être vide");
        } else {
            if (!preg_match('/[a-zA-Z0-9].{1,25}/', $username)){
                throw new Exception("Le nom ".$username." n'est pas valide il faut au minimum 1 caractère et au maximum 25 caractères");
            }
            return Validation::validateString($username);
        }
    }

    /* Vérification de la date */
    public static function validateDate(string $date){ //les dates sont sous la forme "année-mois-jourTheure:minute"
        if ($date != NULL and !preg_match("/^([0-9]{2,4}-){2}[0-9]{2}T[0-9]{2}:[0-9]{2}$/", $date)) {
            throw new Exception("La date n'est pas valide");
        }
        return $date;
    }

    public static function validateString(string $chaine){
        if(filter_var($chaine, FILTER_SANITIZE_STRING) != $chaine) throw new Exception("La chaine '".$chaine."' n'est pas valide.");
        return $chaine;
    }

    public static function validateVisibiliter(bool $visible){
        if ($visible != 0 && $visible != 1) {
            throw new Exception("La visibiliter n'est pas claire");
        }
        return $visible;
    }

    public static function validateMail($mail){
        if ($mail == NULL) {
            throw new Exception("Le mail ne peut être vide");
        } else {
            if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                throw new Exception("L'email '".$mail."' n'est pas valide");
            }
        }
        return $mail;
    }

    /* Le mot de passe doit être constitué de 5 caractères */
    public static function validatePassword(string $password){
        if ($password == NULL) {
            throw new Exception("Le mot de passe ne peut être vide");
        } else {
            if (!preg_match('/^.{5,}$/', $password)) {
                throw new Exception("Le mot de passe n'est pas valide : 5 caractères exigés");
            }
            return Validation::validateString($password);
        }
    }

    /* Fonction qui compare les mots de passe */
    public static function validateConfirmPassword(string $password, string $confirmpassword){
        Validation::validatePassword($confirmpassword);
        if($confirmpassword != $password){
            throw new Exception("Le mot de passe n'est pas similaire");
        }

    }

}
?>

        