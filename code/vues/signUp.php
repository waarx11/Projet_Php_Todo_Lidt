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
        <form action="?action=signUpUser" method="post">
            <div class=" d-flex justify-content-center ">
                <div class="col-xl-6">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-4 text-center">
                                <h2 class="fw-bold mb-2 text-uppercase">SignUp</h2>
                                <p class="text-white-50 mb-5">Please create your account!</p>

                                <?php if (isset($dErreurInscription['userMailInvalide'])) { echo '<div class="alert alert-danger" role="alert">'. $dErreurInscription['userMailInvalide'].'</div>'; } ?>

                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-at" viewBox="0 0 16 16">
                                      <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z"/>
                                      <path d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648Zm-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z"/>
                                        </svg>
                                    </span>
                                    <input type="text" name="userMail" class="form-control" placeholder="Mail" aria-label="Mail" aria-describedby="basic-addon1" <?php if (isset($userMail)) { echo 'value="'.$userMail.'"';}  ?>>
                                </div>


                                <?php if (isset($dErreurInscription['userNameSignUpEmpty'])) { echo '<div class="alert alert-danger" role="alert">'. $dErreurInscription['userNameSignUpEmpty'].'</div>'; } ?>

                                <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                             <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                                            </svg>
                                        </span>
                                        <input type="text" name="userNameSignUp" class="form-control" placeholder="Display Name" aria-label="Username" aria-describedby="basic-addon1" <?php if (isset($userNameSignUp)) { echo 'value="'.$userNameSignUp.'"';}  ?>>
                                </div>


                                <?php if (isset($dErreurInscription['userIdSignUpEmpty'])) { echo '<div class="alert alert-danger" role="alert">'. $dErreurInscription['userIdSignUpEmpty'].'</div>'; } ?>

                                <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                          <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                                        </svg></span>
                                        <input type="text" name="userIdSignUp" class="form-control" placeholder="Username" aria-label="userIdSignUp" aria-describedby="basic-addon1" <?php if (isset($userIdSignUp)) { echo 'value="'.$userIdSignUp.'"';}  ?>>
                                </div>

                                <?php if (isset($dErreurInscription['paswordSignUpEmpty'])) { echo '<div class="alert alert-danger" role="alert">'. $dErreurInscription['paswordSignUpEmpty'].'</div>'; } ?>

                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
                                          <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z"/>
                                          <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                        </svg>
                                    </span>
                                    <input type="password" name="paswordSignUp" id="typePasswordX" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" <?php if (isset($paswordSignUp)) { echo 'value="'.$paswordSignUp.'"';}  ?>>
                                </div>
                                <?php if (isset($dErreurInscription['paswordSignUpNotEquals'])) { echo '<div class="alert alert-danger" role="alert">'. $dErreurInscription['paswordSignUpNotEquals'].'</div>'; } ?>

                                <div class="input-group mb-3">

                                        <div class="input-group mb-3">

                                            <span class="input-group-text" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                                              <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                            </svg>

                                        </span>

                                            <input type="password" name="paswordSignUpEquals" id="typePasswordX" class="form-control" placeholder="Password Retype" aria-label="Password" aria-describedby="basic-addon1" <?php if (isset($paswordSignUpEquals)) { echo 'value="'.$paswordSignUpEquals.'"';}  ?>>
                                    </div>
                                </div>



                                <button class="btn btn-outline-light btn-lg px-5" name="isSubmit" type="submit">SignUp</button>

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
        </form>
    </div>
</section>

</body>
</html>