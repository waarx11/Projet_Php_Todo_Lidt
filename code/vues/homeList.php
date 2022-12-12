<html>
<head>
        <title>TDL Public</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/navBar.css">
        <link rel="stylesheet" href="css/homeList.css">
        

    </head>

    <body>
        <?php 
            require ($rep.$vues['navBar']);
        ?>
        <?php


        // on v�rifie les donn�es provenant du mod�le
        if (isset($dVue))
            {?>

                <div class="centeredContent">
                    <div class="container">
                        <div class="row">
                        <?php
                        foreach ($dVue as $list){?>
                            <div class="col-md-3">

                                <div class="details" onmouseover="precent()">

                                    <h2><?= $list->getNom() ?></h2>
                                    <p><?= $list->getDescription() ?></p>

                                    <a href="index.php?action=tacheX&idList=<?=$list->getId()?>" class="view">
                                        <svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                        </svg > view
                                    </a>

                                    <a href="#" class="delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
</svg>
                                        Delete

                                    </a>
                                </div>
                            </div>
                        <?php
                            }
                            ?>
                            <form>
                                <div class="col-md-3" >
                                    <div class=" detailsAdd" style="text-align: center">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAdd" style="all:unset; cursor: pointer"><p style="font-size: 70px">+</p></button>
                                        <div class="modal fade" id="modalAdd" tabindex="-1000" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalAddTitre">Modal title</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" >
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">Nom</span>
                                                            </div><p>
                                                                <?php if (isset($errNom)) { echo $errNom; } ?>
                                                                <label for="Nom">Nom</label><br>
                                                                <input type="text" name="Nom" id="Nom" placeholder="Nom"<?php if (isset($nom)) { echo 'value="'.$nom.'"';}  ?>>
                                                            </p>
                                                        </div>

                                                        <div class="input-group mb-3">
                                                            <select name="visibilite" class="custom-select" id="inputGroupSelect01">
                                                                <option value="0" selected>Public</option>
                                                                <option value="1">Private</option>
                                                            </select>
                                                        </div>
                                                        <p>
                                                            <?php if (isset($errDescription)) { echo $errDescription; } ?>
                                                            <label for="Description">Description</label><br>
                                                            <textarea type="text" name="Description" id="Description" placeholder="Description"<?php if (isset($description)) { echo 'value="'.$description.'"';}  ?>></textarea>
                                                        </p>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                        <button type="button" id="isSubmit" class="btn btn-primary">Sauvegarder</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if (isset($nom) && isset($visibilite) && isset($description)){
                                echo "<strong>Les informations saisies sont :</strong> <br><strong>Nom :</strong> $nom <br> <strong>Visibiliter :</strong> $visibilite <br> <strong>Description :</strong> $description <br> <strong>La liste a été crée est ajouter au home <strong>";
                            } ?>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
            }
            else {
                print ("erreur !!<br>");
                print ("utilisation anormale de la homeList");
            }
        ?>
<?php
    if (isset($_POST['isSubmit']) && $_POST['isSubmit']==1) {

        if (empty($_POST['nom'])) {
        $errNom='Il faut renseigné le ';
        } else {
        $nom=$_POST['nom'];
        }

        if ($_POST['visibilite']=="0") {
            $visibilite=$_POST['Public'];
        } else {
            $visibilite=$_POST['Priver'];
        }

        if (empty($_POST['description'])) {
        $errDescription='Il faut mettre une ';
        } else {
        $description=$_POST['description'];
        }
    }
?>

    </body>
<!--<script>-->
<!--    function precent(){-->
<!--        this.before.setAttributes('width','100%');-->
<!---->
<!--    }-->
<!--</script>-->
</html>