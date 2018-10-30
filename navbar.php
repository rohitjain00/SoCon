<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FB8C00;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="../Webpages/welcome.php" style="font-weight: 600; font-size: 25px;">So:Con</a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0" style="font-size: 30px; text-align: center;">
            &nbsp;&nbsp;
            <li class="nav-item active">
                <a class="nav-link" href="../Webpages/welcome.php"><i class="fa fa-home" aria-hidden="true"></i>
                    <span class="sr-only">(current)</span></a>
            </li>
            &nbsp;&nbsp;
            <li class="nav-item active" style="font-size: 20px; padding-top: 10px;">
                <a class="nav-link" href="../Webpages/Profile.php"><i style="font-size: 25px;" class="fa fa-user-circle-o" aria-hidden="true"></i>
                    <div style="display: inline;"> <?= strtoupper($_SESSION['sess_user']);?></div>
                    <br> <span class="sr-only">(current)</span></a>
            </li>
            &nbsp;

            <li class="nav-item dropdown" style="list-style: none; font-size: 20px; padding-top: 10px;">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-cog" aria-hidden="true"></i>

                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="../Webpages/accountSettings.php"><i class="fa fa-cogs" aria-hidden="true"></i>
                        Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../Webpages/logout.php">Logout</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="http://www.google.com/search" method="get">
            <input  name="q" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>