<header>
            <nav class="navbar sticky-top  navbar-dark navbar-expand-lg myNav"  >
                <a class="navbar-brand title" href="#">TDL</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup" >
                    <div class="navbar-nav ml-auto" style="float: right;">
                        <a class="nav-item nav-link " href="index.php">Home </a>
                        <a class="nav-item nav-link" href="#">Add</a>
                        <a class="nav-item nav-link" href="#" style=" cursor: default;"></a>
                        <a class="nav-item ">
                            <button class="btn btn-outline-success" type="button">Signup</button>
                        </a>
                        <a class="nav-item nav-link" href="#" style=" cursor: default;"></a>

                        <?php
                        if (! isset($_SESSION['LOGIN']))
                            {?>
                            <!-- form methode="post" name="form" id="form" action=""-->
                            <a class=" nav-item" href="index.php?action=connectionPage" >
                                <button class="btn btn-outline-secondary" type="button">Login</button>
                            </a>
                                <!--<input type="hidden" name="action" value="connectionPage" onclick="clearForm(this.form);">
                                <input type="submit" name="submitLogin" value="LOGIN" onclick="clearForm(this.form);"></td-->                                 
                            <!--/form-->
                                <?php
                            }
                        else { ?>
                            <a class=" nav-item" href="index.php?action=connectionPage" >
                                <button class="btn btn-outline" type="button">Logout</button>
                            </a>
                            <?php } 
                        ?>
                    
                    </div>

                    
                </div>
            </nav>
        </div>
    </div>
</header>