<html>
<head><title>Creation de compte</title></head>
<header>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/ bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGs03+Hhxv8T/Q5PaXtkKtu6ug5T0eNV6gBiFeWPGFN9Muh0f23Q9Ifjh" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css" rel="stylesheet"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" rel="stylesheet"/>

        <script src="js/navBar.js"></script>

        <link rel="stylesheet" href="css/homeList.css">
        <link rel="stylesheet" href="css/navBar.css">
</header>
<body>
    <?php 
        require ($rep.$vues['navBar']);
    ?>
    <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab"
        aria-controls="pills-login" aria-selected="true">Login</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab"
        aria-controls="pills-register" aria-selected="false">Register</a>
    </li>
    </ul>

    
    <div class="tab-content">
    <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
        <form>
        <!-- <div class="text-center mb-3">
            <p>Sign up with:</p>
            <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-facebook-f"></i>
            </button>

            <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-google"></i>
            </button>

            <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-twitter"></i>
            </button>

            <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-github"></i>
            </button>
        </div> -->

        <!-- <p class="text-center">or:</p> -->

        <div class="form-outline mb-4">
             <?php if (isset($errNom)) { echo $errNom; } ?>
            <label for="Nom">Nom</label><br>
            <input type="text" name="Nom" id="Nom" placeholder="Nom"<?php if (isset($nom)) { echo 'value="'.$nom.'"';} ?>>
        </div>

        <!-- <div class="form-outline mb-4">
            <input type="text" id="registerUsername" class="form-control" />
            <label class="form-label" for="registerUsername">Username</label>
        </div>

        <div class="form-outline mb-4">
            <input type="email" id="registerEmail" class="form-control" />
            <label class="form-label" for="registerEmail">Email</label>
        </div> -->

        <div class="form-outline mb-4">
            <p>
                <?php if (isset($errPassword)) { echo $errPassword; } ?>
                <label class="form-label" for="loginPassword">Password</label><br>
                <input type="password" name="loginPassword" id="loginPassword" placeholder="password" <?php if (isset($password)) { echo 'value="'.$password.'"';}  ?>>
            </p>
        </div>

        <div class="form-outline mb-4">
            <input type="password" id="registerRepeatPassword" class="form-control" />
            <label class="form-label" for="registerRepeatPassword">Repeat password</label>
            <p>
                <?php if (isset($errRepeatPassword)) { echo $errRepeatPassword; } ?>
                <label class="form-label" for="repeatPassword">Repeat password</label><br>
                <input type="repeatpassword" name="repeatPassword" id="repeatPassword" placeholder="password" <?php if (isset($repeatPassword)) { echo 'value="'.$repeatPassword.'"';}  ?>>
            </p>
        </div>

        <div class="form-check d-flex justify-content-center mb-4">
            <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" checked
            aria-describedby="registerCheckHelpText" />
            <label class="form-check-label" for="registerCheck">
            I have read and agree to the terms
            </label>
        </div>
        <input type="hidden" name="isSubmit" value="1"/>
        <input type="submit" value="Envoie" id="Envoie" class="btn btn-primary btn-block mb-4" onclick="getValue();"/>
        

        <div class="text-center">
            <p>You are member ? <a href="#signUp.php">Login</a></p>
        </div>
        </form>
</div>
</div>
<?php
include "Utilisateur.php";
// include "TableauPersonne.php";
if (isset($_POST['isSubmit']) && $_POST['isSubmit']==1) {
	if (empty($_POST['email']) || !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
		$errEmail='Il faut renseigné l\'';
	} else {
		$email=$_POST['email'];
	}

	if (empty($_POST['password']) && strlen($_POST['password'])>=6) {
		$errPassword='Il faut renseigné le ';
	} else {
		$password=$_POST['password'];
	}

	if (empty($_POST['repeatPassword']) && strlen($_POST['repeatPassword'])>=6) {
		$errRepeatPassword='Il faut renseigné le ';
	} else {
		$repeatPassword=$_POST['password'];
	}

	if ($_POST['password']!=$_POST['repeatPassword']) {
		$errRepeatPassword='Les deux mots de passe ne sont pas égaux erreur sur  ';
	}

    if(!empty($email) && !empty($password)){
        // chercher l'existance de l'utilisateur
        $p1 = new Utilisateur($nom, $prenom, $dateNaissance, $email);
        $tab[]=$p1;
    }
    if(!empty($tab)){
        $tab_serialiser = urlencode(addslashes(serialize($tab)));
        echo "<a href='vueDesPersonnes.php?PersonnesList=$tab_serialiser' title='Envoyer'>Envoyer des données via une url</a>";
    }
}
?>
</body>
</html>