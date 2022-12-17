<?php

class Validation {
    public static function validateInt(string $int){
        if(filter_var($int, FILTER_SANITIZE_NUMBER_INT) != $int) return false;
        return $int;
    }

    public static function validateMail(string $title,&$dErreur){
        if (empty($title) || $title==NULL){
            $dErreur['userMailInvalide'] = 'Il faut renseigné le mail ';
            return false;
        }
        if(!filter_var($title,FILTER_VALIDATE_EMAIL)) {
            $dErreurInscription['userMailInvalide'] = "Ce n'est pas un mail valid ";
            return false;
        }
        return true;
    }

    public static function validateId(string &$userid,&$dErreur){
        if (empty($userid) || $userid==NULL){
            $dErreur['userIdSignUpEmpty'] = 'Il faut renseigné le id ';
            return false;
        }
        $userid=Validation::cleanString($userid);

        if (!preg_match('/[a-zA-Z0-9].{4,30}/', $userid)){
            $dErreur['userIdSignUpEmpty'] ="le nom n'est pas valide il faut au minimum 5 caractère et au maximum 30 caractères sans caractere spécial";
            return false;
        }
        return true;
    }

    public static function validateString(string &$username,&$dErreur,$err,$message){
        if (empty($username) || $username==NULL){
            $dErreur[$err] = $message;
            return false;
        }
        $username=Validation::cleanString($username);
        return true;
    }

    /* Vérification de la date */
    public static function validateDate(string $date){ //les dates sont sous la forme "année-mois-jourTheure:minute"
        if ($date != NULL and !preg_match("/^([0-9]{2,4}-){2}[0-9]{2}T[0-9]{2}:[0-9]{2}$/", $date)) {
            throw new Exception("La date n'est pas valide");
        }
        return $date;
    }

    public static function cleanString(string $chaine){
        error_reporting(E_ERROR | E_PARSE);
        return (filter_var($chaine, FILTER_SANITIZE_STRING));
    }

    public static function validateVisibiliter(bool $visible){
        if ($visible != 0 && $visible != 1) {
            throw new Exception("La visibiliter n'est pas claire");
        }
        return $visible;
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

        