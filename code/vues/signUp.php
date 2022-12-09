<html>
<head><title>SignUp</title></head>
<header>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
       
        <link rel="stylesheet" href="css/sign.css">
        <link rel="stylesheet" href="css/navBar.css">
</header>
<body>
    <?php 
        require ($rep.$vues['navBar']);
    ?>
    <section class="gradient-custom">
        <div class="container">
            <div class=" d-flex justify-content-center ">
                <div class="col-xl-6">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-4 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">SignUp</h2>
                                <p class="text-white-50 mb-5">Please enter your username and password!</p>

                    
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">@</span>
                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">@</span>
                                    <input type="password"  id="typePasswordX" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                                </div>


                                <button class="btn btn-outline-light btn-lg px-5" type="submit">SignUp</button>

                                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                    <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                    <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                    <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!--    --><?php
//
//include "Utilisateur.php";
//// include "TableauPersonne.php";
//if (isset($_POST['isSubmit']) && $_POST['isSubmit']==1) {
//	if (empty($_POST['email']) || !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
//		$errEmail='Il faut renseigné l\'';
//	} else {
//		$email=$_POST['email'];
//	}
//
//	if (empty($_POST['password']) && strlen($_POST['isSubmit'])>=6) {
//		$errPassword='Il faut renseigné le ';
//	} else {
//		$password=$_POST['password'];
//	}
//
//    if(!empty($email) && !empty($password)){
//        // chercher l'existance de l'utilisateur
//        $p1 = new Utilisateur($nom, $prenom, $dateNaissance, $email);
//        $tab[]=$p1;
//    }
//    if(!empty($tab)){
//        $tab_serialiser = urlencode(addslashes(serialize($tab)));
//        echo "<a href='vueDesPersonnes.php?PersonnesList=$tab_serialiser' title='Envoyer'>Envoyer des données via une url</a>";
//    }
//}
//?>
</body>
</html>