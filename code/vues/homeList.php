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
                        foreach ($dVue as $list){
                            ?>
                            <div class="col-md-3">

                                <div class="details<?php echo $list->getId()?>">

                                    <style>
                                        .details<?php echo $list->getId()?>{
                                            margin: 20px 0;
                                            background-coLor: #fff;
                                            padding: 20px 10px;
                                            position: relative;
                                            z-index: 1;
                                        }

                                        .details<?php echo $list->getId()?> h2{
                                            font-size: 22px;
                                            text-transform: uppercase;
                                            transition: 0.6s all;
                                        }


                                        .details<?php echo $list->getId()?> p{
                                            font-size: 14px;
                                            transition: 0.6s all;
                                        }
                                        .details<?php echo $list->getId()?> a{
                                            text-decoration: none;
                                            text-transform: capitalize;

                                            padding: 6px 12px;
                                            display: inline-block;
                                            font-size: 14px;

                                            transition: 0.6s all;
                                        }
                                        .details<?php echo $list->getId()?>::before{
                                            content: "";
                                            width: 5px ;
                                            height: 100%;
                                            background-coLor: #E67E22 ;
                                            position: absolute;
                                            left: 0;
                                            top: 0;
                                            z-index: -1;
                                            transition: 0.6s all;


                                        }
                                        .details<?php echo $list->getId()?>:hover::before{
                                            width:   <?php echo $this->checkedPrc($list->getId())?>%;

                                        }
                                        .details<?php echo $list->getId()?>:hover h2,.details<?php echo $list->getId()?>:hover p,.details<?php echo $list->getId()?>:hover h6{
                                            color: #283747;
                                        }
                                        .details<?php echo $list->getId()?>:hover a{
                                            font-weight: bold;
                                        }

                                    </style>

                                    <h2><?= $list->getNom() ?>
                                    <?php
                                        if(isset($_SESSION['user']) && (!$list->getVisibilite())){?>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lock" viewBox="0 0 16 16">
                                                <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 5.996V14H3s-1 0-1-1 1-4 6-4c.564 0 1.077.038 1.544.107a4.524 4.524 0 0 0-.803.918A10.46 10.46 0 0 0 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h5ZM9 13a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2Zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1Z"/>
                                            </svg>
                                       <?php
                                       }else{?>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                            </svg>
<?php
                                       }?>

                                    </h2>
                                    <h6>Crée par <?=$list->getUserid()?></h6>
                                    <p><?= $list->getDescription() ?></p>

                                    <a href="index.php?action=tacheX&idList=<?=$list->getId()?>" class="view">
                                        <svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                        </svg > view
                                    </a>

                                    <a href="#" onclick="popUpConfirmationDelete( '<?php echo  $list->getNom()?>', '<?php echo  $list->getId()?>')" class="delete">
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
                            <?php
                            if(isset($_SESSION['user']) ){?>
                                <form action="?action=addList" method="post">
                                    <div class="col-md-3" >
                                        <div style="text-align: center">
                                            <div class="detailsAdd" >
                                                <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAdd" style="all:unset; cursor: pointer"><p style="font-size: 70px">+</p></button>
                                            </div>
                                            <div class="modal fade" id="modalAdd" tabindex="-1000" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalAddTitre">Add List</h5>
                                                            <button type="submit" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body" >
                                                            <?php if (isset($dVueEreur['nom'])) { echo $dVueEreur['nom']; } ?>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1">@</span>
                                                                </div>

                                                                <input type="text" name="listName" class="form-control" placeholder="Name" <?php if (isset($listName)) { echo 'value="'.$listName.'"';}  ?> aria-label="Username" aria-describedby="basic-addon1">
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <select name="listVisibilite" class="custom-select" id="inputGroupSelect01">
                                                                    <option value="1" selected>Public</option>
                                                                    <option value="0">Private</option>
                                                                </select>
                                                            </div>
                                                            <?php if (isset($dVueEreur['description'])) { echo $dVueEreur['description']; } ?>
                                                            <div class="input-group mb-3"  >
                                                                <textarea style="width: 500px;height: 150px" type="text" name="listDescription" id="Description" placeholder="Description"<?php if (isset($description)) { echo 'value="'.$description.'"';}  ?>></textarea>
                                                            </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" id="isSubmit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                </form>
                            <?php }?>
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

<script>
        function popUpConfirmationDelete(nom,id) {
            let text = "Are you sure you want to delete this list "+ nom +"\nEither OK or Cancel.";
            if (confirm(text) == true) {
                location.replace("index.php?action=listDelete&idList="+id);
            }
            document.getElementById("demo").innerHTML = text;
        }
</script>

    </body>
</html>