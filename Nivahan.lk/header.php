<body>
<div class="container-fluid">
    <div class="row" id="logo">
        <div class="col-md-6" >
            <center>
                <img src="images/logo/logo.png">
            </center>
        </div>

        <div class="col-md-6">
            <center>
                <!--add social media links to site-->
                <i id="SocialMediaTop1" class="fa fa-facebook fa-2x" aria-hidden="true"></i>
                <i id="SocialMediaTop2" class="fa fa-twitter fa-2x" aria-hidden="true"></i>
                <i id="SocialMediaTop3" class="fa fa-instagram fa-2x" aria-hidden="true"></i>
                <i id="SocialMediaTop4" class="fa fa-youtube fa-2x" aria-hidden="true"></i>
            </center>
        </div>
    </div>

    <div class="row" id="Header">
        <!--add navgation bar to site-->
        <nav class="navbar navbar-inverse" id="NavBar">
            <div class="container-fluid" >
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php" id="NavFontLogo">Nivahan.lk</a>
                </div>
                <ul class="nav navbar-nav" >

                    <li><a href=<?php if (isset($_SESSION['uname'])){echo 'FindAProffesinal.php';}else{echo 'signup.php';}?> id="NavFont">Find Architect</a></li>
                    <?php if(isset($_SESSION['uname']) && $_SESSION['utype']==3){?>
                        <li><a href="FindResearcher.php" id="NavFont">Researcher</a></li>
                    <?php }?>
                    <li><a href="<?php if (isset($_SESSION['uname'])){echo 'forum.php';}else{echo 'signup.php';}?> " id="NavFont">Forum</a></li>
                    <li><a href="Wiki.php" id="NavFont">Wiki</a></li>
                    <li><a href="AboutUs.php" id="NavFont">About Us</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right" id="NavFont">
                    <?php
                    if (isset($_SESSION['uname'])){
                        ?>
                        <li><a href="chat.php" id="NavFont"><i class="fa fa-comments" aria-hidden="true"></i> Messages</a></li>
                        <li><a href="<?php if(isset($_SESSION['uname']) && $_SESSION['utype']==2 )
                                               { echo('ArchiProfile(archi view).php'); }
                                               elseif(isset($_SESSION['uname']) && $_SESSION['utype']==3 ){
                                                   echo 'researcherProfile(researchers view).php';
                                               }elseif(isset($_SESSION['uname']) && $_SESSION['utype']==1 ){
                                                    echo 'CustomerProfile(customer_view).php';
                                               }?>" id="NavFont"><i class="fa fa-user-circle-o" aria-hidden="true"></i><?php echo " ".($_SESSION['uname']) ?> </a></li>
                        <li><a href="logout.php" id="NavFont"><i class="fa fa-sign-in " aria-hidden="true"></i> LogOut</a></li>

                        <?php
                    }else{
                    ?>
                    <li><a href="signup.php" id="NavFont"><i class="fa fa-user-plus " aria-hidden="true"></i> Sign Up</a></li>
                    <li><a href="login.php" id="NavFont"><i class="fa fa-sign-in " aria-hidden="true"></i> Login</a></li>
                </ul>
                <?php
                }
                ?>

            </div>
        </nav>
    </div>