<?php
session_start();
if(!isset($_SESSION["sess_user"])){
    header("Location: login.php");
}
else
{
    ?>
    <!doctype html>
    <html>
    <head>
        <title>SoCon : Social Connectivity</title>
        <?php
        include 'headerInclude.php'
        ?>
    </head>

    <body>
    <?php
    include 'navbar.php';
    ?>
    <div class="container-fluid">
        <div class="row profilePicDiv">
            <span class="col-lg-4"></span>
            <div class="col-lg-4 profileImg">
            <img src="../Img/kortex_anime_naruto_tobi_uchiha_obito_man_moon_magic_horn_staff_night_95177_1600x900.jpg" alt="profile pic">
            </div>
            <span class="col-lg-4"></span>
        </div>
    </div>
    <div class="container-fluid profileInfoTab">
        <div class="row">
            <span class="col-lg-1"></span>
            <div class="col-2">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">About</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Friends</a>
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Posts</a>
                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Mutual Friends</a>
                </div>
            </div>
            <div class="col-8">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <div class="container-fluid">
                            <div class="row aboutProfile">
                                <div class="col-lg-4 leftSection">
                                    <i class="fa fa-gift" aria-hidden="true"></i>
                                    &nbsp;
                                    2 May, 2000
                                    <hr>
                                    <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                    Studied at xyz School
                                    <hr>
                                    <i class="fa fa-briefcase" aria-hidden="true"></i>&nbsp;
                                    Worked at abc Company
                                    <hr>
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                    12 friends
                                </div>
                                <div class="col-lg-5 ProfileQuote">
                                    <div class="card">
                                        <div class="card-body">
                                            <blockquote class="blockquote mb-0">
                                                <p>JOHN DOE</p>

                                                <blockquote class="blockquote-footer">Mah Life Mah Rules..</blockquote>
                                            </blockquote>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 leftSection">
                                    <i class="fa fa-mobile" aria-hidden="true" style="font-size: 25px"></i>
                                    &nbsp;
                                    +91 (907) 123 3432
                                    <hr>
                                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                    absc@gmail.com

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

                        <div id="items">
                            <div class="item">

                           </div>
                            <div class="item">

                            </div>
                            <div class="item">

                            </div>
                            <div class="item">

                            </div>
                            <div class="item">

                            </div>
                            <div class="item">

                            </div>
                            <div class="item">

                            </div>
                            <div class="item">

                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">

                        <div id="items">
                            <div class="item ProfilePosts">

                            </div>
                            <div class="item ProfilePosts">

                            </div>
                            <div class="item ProfilePosts">

                            </div>
                            <div class="item ProfilePosts">

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab"> <div id="items">
                            <div class="item">

                            </div>
                            <div class="item">

                            </div>
                            <div class="item">

                            </div>
                            <div class="item">

                            </div>
                            <div class="item">

                            </div>
                            <div class="item">

                            </div>
                            <div class="item">

                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <span class="col-lg-1"></span>
        </div>
    </div>

    <?php
    include 'footerInclude.php'
    ?>
    </body>
    </html>
    <?php
}
?>