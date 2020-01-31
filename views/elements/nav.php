    <?php
     // if user is logged in (session is NOT empty)
     if( !empty( $_SESSION['user_logged_in']) ) {
    ?>
<div style="background-color: #4EAD64;">

<div class="col-12">
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="/">
            <img src="../images/logo.png" width="80px" alt="MOC">
        </a>


   
        <form class="form-inline" id="search_form">
            <input type="search" name="search" autocomplete="off" id="search" class="form-control" placeholder="Search...">
            <div id="search_results">

            </div>
        </form>
 




    <button class="navbar-toggler" data-toggle="collapse" data-target="#mainNavBar">
        <i class="fas fa-hamburger"></i>  
        <!-- This area is where you could place code for persons specific profile picture -->
    </button>

    <div class="navbar-collapse collapse" id="mainNavBar">
        <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="accountDropdown" data-toggle="dropdown">Welcome <?=$current_user['firstname']?></a>
                    <div class="dropdown-menu drop">
                        <a class="dropdown-item" href="/users/">My Profile</a>
                        <a class="dropdown-item" href="/users/logout.php">Logout</a>
                    </div>
                </li>    
        </ul>
    </div>

</div> <!-- End of Col-12 Div -->
</div> <!-- End of NavBar Color Div -->
    <?php
    }
    ?>

</nav>