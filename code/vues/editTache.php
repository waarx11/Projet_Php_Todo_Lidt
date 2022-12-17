<html>
<head>
    <title>TDL Public</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/tache.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/navBar.css">



</head>

<body>
<?php

require ($rep.$vues['navBar']);
?>
<?php

if (isset($task) )
{ ?>
<div class="container">
    <div class="align-items-center">
    <form action="?action=tacheXUpdate&idTask=<?=$idTaskVerif?>&idList=<?=$idListeVerif?>" method="post">
        <div class="col-md-3" >
            <div style="text-align: center">
                    <div class="modal-dialog" role="document" style="width: 1000px">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalAddTitre">Edit Task <?= $task->getNom() ?></h5>
                            </div>
                            <div class="modal-body" >
                                <?php if (isset($dVueEreur['tacheName'])) { echo '<div class="alert alert-danger" role="alert">'. $dVueEreur['tacheName'].'</div>'; } ?>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">@</span>
                                    </div>
                                    <input type="text" name="tacheName" class="form-control" placeholder="Name" <?php echo 'value="'.$task->getNom().'"';
                                    ?> aria-label="Username" aria-describedby="basic-addon1">
                                </div>

                                <?php if (isset($dVueEreur['tacheRepete'])) { echo '<div class="alert alert-danger" role="alert">'. $dVueEreur['tacheRepete'].'</div>'; } ?>
                                <div class="input-group mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="tacheRepete" class="custom-control-input" id="tacheRepete">
                                        <label class="custom-control-label" for="tacheRepete">Repeative Task</label>
                                    </div>
                                </div>

                                <?php if (isset($dVueEreur['tachePriorite'])) { echo '<div class="alert alert-danger" role="alert">'. $dVueEreur['tachePriorite'].'</div>'; } ?>
                                <div class="input-group mb-3"  >
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Priorty of the task</span>
                                    </div>
                                    <input type="number" id="tachePriorite" name="tachePriorite" min="1"   <?php echo 'value="'.$task->getPriorite().'"';  ?>>
                                </div>


                                <div class="modal-footer">
                                    <button type="submit" id="isSubmit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </form>
    </div>
</div>


    <?php
}

else {?>
<div class="container">
    <div class="row align-items-center">
        <div class="alert alert-danger" role="alert" >
            <h4 class="alert-heading">Un erreur est survenue</h4>
            <p>Utilisation pas normal de page edit tache</p>
            <hr>
            <p class="mb-0">Désolé pour cet erreur</p>
        </div>
    </div>

    <?php }
    ?>

</body>
</html>