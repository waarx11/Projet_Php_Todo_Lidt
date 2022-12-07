<html>
<head>
        <title>TDL Public</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/ bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGs03+Hhxv8T/Q5PaXtkKtu6ug5T0eNV6gBiFeWPGFN9Muh0f23Q9Ifjh" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css" rel="stylesheet"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" rel="stylesheet"/>

        <script src="js/navBar.js"></script>
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
                        for ($k = 0 ; $k < 10; $k++){?>
                            <div class="col-md-4">
                                <div class="details">
                                    <h2>heading</h2>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>

                                    <a href="#" class="view">
                                        <svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                        </svg > view
                                    </a>

                                    <a href="#" class="delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-octagon-fill" viewBox="0 0 16 16">
                                            <path d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zm-6.106 4.5L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/>
                                        </svg>
                                        Delete

                                    </a>
                                </div>
                            </div>
                        <?php
                            }
                            ?>

                            

                            </div>

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

    </body>
</html>