
        <header class="site-navbar mt-3">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="site-logo col-6"><a href="index.html">TDL</a></div>

                    <nav class="mx-auto site-navigation">
                        <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
                            <li><a href="index.html" class="nav-link active">Home</a></li>
                            <li><a href="about.html">Add</a></li>
                            <!-- <li class="has-children">
                                <a href="job-listings.html">Job Listings</a>
                                <ul class="dropdown">
                                    <li><a href="job-single.html">Job Single</a></li>
                                    <li><a href="post-job.html">Post a Job</a></li>
                                </ul>
                            </li> -->
                            
                        </ul>
                    </nav>

                    <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
                        <div class="ml-auto">
                            <a href="post-job.html" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-add"></span>Sign up</a>
                            <?php
                            if (! isset($_SESSION['LOGIN']))
                            {?>
                            <!-- form methode="post" name="form" id="form" action=""-->
                                 <a href="index.php?action=connectionPage" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Log In</a>
                                 <!--<input type="hidden" name="action" value="connectionPage" onclick="clearForm(this.form);">
                                 <input type="submit" name="submitLogin" value="LOGIN" onclick="clearForm(this.form);"></td-->                                 
                            <!--/form-->
                                <?php
                            }
                            else { ?>
                                 <a href="login.html" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Log Out</a>
                                <?php } 
                            ?>
                           
                        </div>
                        <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>
                    </div>

                </div>
            </div>
        </header>