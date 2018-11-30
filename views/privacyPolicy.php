    <?php
    session_start();
    if(!isset($_SESSION["username"])){
        echo"<script type='text/javascript'>location.href = '../views/login.php'</script>";
    }
    else
    {
        ?>
        <!doctype html>
        <html>
        <head>
            <title>SoCon : Social Connectivity</title>
            <?php
            include '../includes/headerInclude.php';
            ?>
        </head>

        <body>
        <?php
        include '../components/navbar.php';
        ?>
        <div class="container-fluid" style="padding-top: 20px;">
            <div class="row allRow">
                <div class="col-lg-2 col-md-2 col-xl-2 mainSideBar maxHeight">
                    <?php
                    include '../components/mainPageSideBar.php';
                    ?>
                </div>
                <div class="col-lg-1 col-md-1 col-xl-1"></div>
                <div class="col-lg-5 col-md-5 col-xl-5 maxHeight">
                    <div class='card' style='width: 100%;' >
                        <div class='card-body'>
                            <h5 class='card-title'>Our Privacy Policy</h5><hr>
                            <p class='card-text'>* When you use our services, you’re trusting us with your information. We understand this is a big responsibility and work hard to protect your information and put you in control. <br><br>
                                * This Privacy Policy is meant to help you understand what information we collect, why we collect it,  and how you can update, manage, export, and delete your information​. <br><br>
                                * You can use our services in a variety of ways to manage your privacy. For example, you can sign up for a SoCon Account if you want to create and manage content like messages and photos.When you create a SoCon Account, you provide us with personal information that includes your name and a password. You can also choose to add a phone number.
                            </p>
                            <a href='./welcome.php' class='card-link'>Homepage</a>
                        </div>
                    </div>

                </div>

                <div class="col-lg-2 col-md-2 col-xl-2"></div>
                <!--            <div class="col-lg-3 col-md-3 col-xl-3 maxHeight extracss">-->
                <!--                --><?php
                //                    include 'extra.php';
                //                ?>
                <!--            </div>-->

            </div>
        </div>

        <?php
        include '../components/sideButton.php';
        include '../includes/footerInclude.php';
        ?>
        </body>
        </html>
        <?php
    }
    ?>