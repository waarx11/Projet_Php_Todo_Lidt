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
                                          <?php
                                          if($tache->getRepetition()) {
                                              echo '<svg xmlns = "http://www.w3.org/2000/svg" width = "16" height = "16" fill = "currentColor" class="bi bi-repeat" viewBox = "0 0 16 16" >
                                                                 <path d = "M11 5.466V4H5a4 4 0 0 0-3.584 5.777.5.5 0 1 1-.896.446A5 5 0 0 1 5 3h6V1.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192Zm3.81.086a.5.5 0 0 1 .67.225A5 5 0 0 1 11 13H5v1.466a.25.25 0 0 1-.41.192l-2.36-1.966a.25.25 0 0 1 0-.384l2.36-1.966a.25.25 0 0 1 .41.192V12h6a4 4 0 0 0 3.585-5.777.5.5 0 0 1 .225-.67Z" />
                                                            </svg >';
                                          }
                                          ?>
                                        <div class="custom-checkbox custom-control">

                                            <div class="badge badge-pill badge-info ml-2">Priority  <?=$tache->getPriorite()?></div>

                                          </div>

                                      </div>
                                      <div  style="display: flex;align-items: baseline;">
                                              <input class="strikeThrough" type="checkbox"
                                                  <?php if($tache->getChecked()) {
                                                      echo 'checked';
                                                  }
                                                  ?> onchange="updateBaseCheck(<?php echo $tache->getId()?>)"
                                              />
                                              <span class="strikeThroughText" >
                                                 <p><?=$tache->getNom()?></p>
                                              </span>

                                      </div>

                                        <div class="widget-content-right">
                                            <div class="widget-subheading">
                                                <i><?=$tache->getDateCreation()?></i> / <?=$tache->getDateFin()?> <br> <p>Crée par <?=$tache->getUser()?></p> </i>
                                            </div>
                                              <button class="border-0 btn-transition btn btn-outline-danger" onclick="popUpConfirmationDelete( '<?php echo  $tache->getNom()?>' , '<?php echo $tache->getId()?>' )">
                                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                          <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                    </svg>
                                              </button>

                                            <button class="border-0 btn-transition btn btn-outline-success" >
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
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
        <div class="card-footer">
          <button class="mr-2 btn btn-link btn-sm" style="visiblty:hidden; cursor:default;"></button>
            <form action="?action=tacheXAdd" method="post">
                <div class="col-md-3" >
                    <div style="text-align: center">
                        <div class="detailsAdd" >
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAdd" >Add Task</button>
                        </div>
                        <div class="modal fade" id="modalAdd" tabindex="-1000" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalAddTitre">Add Task</h5>
                                        <button type="submit" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" >
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">@</span>
                                            </div>
                                            <input type="text" name="tacheName" class="form-control" placeholder="Name" <?php if (isset($nom)) { echo 'value="'.$nom.'"';}  ?> aria-label="Username" aria-describedby="basic-addon1">
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="tacheRepete" class="custom-control-input" id="tacheRepete">
                                                <label class="custom-control-label" for="tacheRepete">Repeative Task</label>
                                            </div>
                                        </div>

                                        <div class="input-group mb-3"  >
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Priorty of the task</span>
                                            </div>
                                            <input type="number" id="tachePriorite" name="tachePriorite" min="1" >

                                        </div>
                                        <div class="input-group mb-3"  >
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Finish date</span>
                                            </div>
                                        </div>

                                        <div class="input-group mb-3"  >
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1" >Year</span>
                                            </div>
                                            <input style="width: 60px" type="number" id="tacheYear" name="tacheYear" min="1" >

                                            <div class="input-group-prepend">
                                                <span  style="width: 60px"  class="input-group-text" id="basic-addon1">Day</span>
                                            </div>
                                            <input type="number" id="tacheDay" name="tacheDay" min="1" max="31">

                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Month</span>
                                            </div>
                                            <select class="form-control" name="tacheMonth" id="tacheMonth">
                                                <option value="1" >January</option>
                                                <option value="2" >February</option>
                                                <option value="3" >March</option>
                                                <option value="4" >April</option>
                                                <option value="5" >May</option>
                                                <option value="6" >June</option>
                                                <option value="7" >July</option>
                                                <option value="8" >August</option>
                                                <option value="9" >September</option>
                                                <option value="10" >October</option>
                                                <option value="11" >November</option>
                                                <option value="12" >December</option>
                                            </select>
                                            <input type="hidden" name="tacheListe" value=<?=$listName?>>
                                            <input type="hidden" name="pageAct" value="index.php?action=tacheX&idList=<?=$listName?>">
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