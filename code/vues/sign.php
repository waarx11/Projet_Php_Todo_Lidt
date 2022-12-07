<html>
<head><title>Login</title></head>
<header>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/ bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGs03+Hhxv8T/Q5PaXtkKtu6ug5T0eNV6gBiFeWPGFN9Muh0f23Q9Ifjh" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css" rel="stylesheet"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" rel="stylesheet"/>

        <script src="js/navBar.js"></script>

        <link rel="stylesheet" href="css/sign.css">
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
    <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
        <form>
        <!-- <div class="text-center mb-3">
            <p>Sign in with:</p>
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
            <p>
                <?php if (isset($errEmail)) { echo $errEmail; } ?>
                <label for="Email">Email</label><br>
                <input type="email" name="email" id="email" placeholder="Email" <?php if (isset($email)) { echo 'value="'.$email.'"';}  ?>>
            </p>
        </div>


        <div class="form-outline mb-4">
            <p>
                <?php if (isset($errPassword)) { echo $errPassword; } ?>
                <label class="form-label" for="loginPassword">Password</label><br>
                <input type="password" name="loginPassword" id="loginPassword" placeholder="password" <?php if (isset($password)) { echo 'value="'.$password.'"';}  ?>>
            </p>
        </div>


        <div class="row mb-4">
            <div class="col-md-6 d-flex justify-content-center">

            <div class="form-check mb-3 mb-md-0">
                <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
                <label class="form-check-label" for="loginCheck"> Remember me </label>
            </div>
            </div>

            <div class="col-md-6 d-flex justify-content-center">

            <a href="#!">Forgot password?</a>
            </div>
        </div>
        <input type="hidden" name="isSubmit" value="1"/>
        <input type="submit" value="Envoie" id="Envoie" class="btn btn-primary btn-block mb-4" onclick="getValue();"/>
        

        <div class="text-center">
            <p>Not a member? <a href="#signUp.php">Register</a></p>
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

	if (empty($_POST['password']) && strlen($_POST['isSubmit'])>=6) {
		$errPassword='Il faut renseigné le ';
	} else {
		$password=$_POST['password'];
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