<nav class="navbar navbar-expand-lg navbar-dark  fixed-top" style="background-color:#0f2747;">
                        <div class="container">
                            <a href="index.php" class="navbar-brand"><img src="img/noticeNepal.png" alt="Notice Nepal Home" /></a>

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavdrop" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNavdrop">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item"><a href="index.php" class="aColor" <?php if($thispage=="home")echo "id=\"curpage\"";?>>Home</a></li>
                                    <li class="nav-item "><a href="todaynotice.php" class="aColor" <?php if($thispage=="todaysnotice")echo "id=\"curpage\"";?>>All Tenders/Notice</a></li>
                                    <li class="nav-item"><a href="jobs.php" class="aColor" <?php if($thispage=="jobs")echo "id=\"curpage\"";?>>Jobs</a></li>
                                    
                                    <li class="nav-item"><a href="about.php" class="aColor" <?php if($thispage=="about")echo "id=\"curpage\"";?>>About</a></li>

                                    
                                    <li class="nav-item"><a href="contact.php" class="aColor" <?php if($thispage=="contact")echo "id=\"curpage\"";?>>Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <!-- end of nav -->
