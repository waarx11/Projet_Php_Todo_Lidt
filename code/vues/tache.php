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


        // on v�rifie les donn�es provenant du mod�le
        if (isset($dVue))
            {?>
                    <div class=" d-flex justify-content-center  taskList">
    <div class="col-md-9">
      <div class="card-hover-shadow-2x mb-5 card">
        <div class="card-header-tab card-header">
          <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i
              class="fa fa-tasks"></i>&nbsp;Task <?=$listName?></div>
          
        </div>
        <div class="scroll-area-sm" style="height: 650px;">
          <perfect-scrollbar class="ps-show-limits">
            <div style="position: static;" class="ps ps--active-y">
              <div class="ps-content">
                <ul class=" list-group list-group-flush">
                    
                <?php
                        foreach ($dVue as $tache){?>

                            <li class="list-group-item">
                                <div class="todo-indicator bg-warning"></div>
                                  <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                      <div class="widget-content-left mr-2">
                                        <div class="custom-checkbox custom-control">
<!--                                          <input class="custom-control-input strikeThrough" id=--><?php //echo "exampleCustomCheckbox".$tache->getId();?><!-- type="checkbox">-->
<!--                                            <label class="custom-control-label" for=--><?php //echo "exampleCustomCheckbox".$tache->getId();?><!--&nbsp;</label>-->
<!--                                            </input>-->
                                            <input type="checkbox"
                                                <?php if($tache->getChecked()) {
                                                    echo 'checked';
                                                }
                                                ?>

                                                   onchange="updateBaseCheck(<?php echo $tache->getId()?>)" />

                                          </div>
                                      </div>
                                      <div class="widget-content-left">

                                          <span class="strikeThroughText widget-heading " >
                                                <?php if($tache->getRepetition()) {
                                                    echo '<svg xmlns = "http://www.w3.org/2000/svg" width = "16" height = "16" fill = "currentColor" class="bi bi-repeat" viewBox = "0 0 16 16" >
                                                             <path d = "M11 5.466V4H5a4 4 0 0 0-3.584 5.777.5.5 0 1 1-.896.446A5 5 0 0 1 5 3h6V1.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192Zm3.81.086a.5.5 0 0 1 .67.225A5 5 0 0 1 11 13H5v1.466a.25.25 0 0 1-.41.192l-2.36-1.966a.25.25 0 0 1 0-.384l2.36-1.966a.25.25 0 0 1 .41.192V12h6a4 4 0 0 0 3.585-5.777.5.5 0 0 1 .225-.67Z" />
                                                        </svg >';
                                                }
                                                ?>
                                              <?=$tache->getNom()?>
                                              <div class="badge badge-pill badge-info ml-2">  <?=$tache->getPriorite()?></div>
                                          </span>
                                        <div class="widget-subheading">
                                            <i><?=$tache->getDateCreation()?></i> / <?=$tache->getDateFin()?> <br> <p>Crée par <?=$tache->getUser()?></p> </i>
                                          </div>
                                      </div>
                                        <div class="widget-content-right">
                                              <button class="border-0 btn-transition btn btn-outline-danger" onclick="popUpConfirmationDelete( '<?php echo  $tache->getNom()?>' , '<?php echo $tache->getId()?>' )">
                                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                          <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                    </svg>

                                              </button>
                                        </div>
                                    </div>
                                </div>
                              </li>
                  <?php
                            }
                            ?>
                
                </ul>
              </div>
              
            </div>
          </perfect-scrollbar>
        </div>
        <div class="d-block text-right card-footer">
          <button class="mr-2 btn btn-link btn-sm" style="visiblty:hidden; cursor:default;"></button>
        <button class="btn btn-primary">Add Task</button>
        </div>
      </div>
    </div>
    </div>

    <script>
        function popUpConfirmationDelete(nom,id) {
            let text = "Are you sure you want to delete this task "+ nom +"\nEither OK or Cancel.";
            if (confirm(text) == true) {
                location.replace("index.php?action=tacheXDelet&idTask="+id+"&idList=<?=$listName?>");
            }
            document.getElementById("demo").innerHTML = text;
        }

        function updateBaseCheck(id) {
            location.replace("index.php?action=tacheCheked&idTask="+id+"&idList=<?=$listName?>");

        }
    </script>

                            

                          

                <?php
            }
            else {
                print ("erreur !!<br>");
                print ("utilisation anormale de la homeList");
            }
        ?>

    </body>
</html>