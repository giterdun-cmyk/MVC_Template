<?php
    require_once("../../controllers/includes.php");
    
    $title = "My Profile";
    
    require_once("../elements/header.php");
    require_once("../elements/nav.php");
    
    // Check if the id is set
    // if it is, get the user by id andpass data
    // else load current user
    if( !empty($_GET['id'])) {
        $user_id = $_GET['id'];
        $u_model = new User;
        $selected_user = $u_model->get_by_id($user_id);
    } else {
        $selected_user = $current_user;
    }

?>

<div class="container col-md-8 pt-5">
    <div class="card edit_card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <h2>My Profile</h2>
                    <div>

                        <?php
                        /* $user = new User;
                        $current_user = $user->get_by_id($_SESSION['user_logged_in']);
                        */

                        // echo $current_user['firstname']. " " . $current_user['lastname']. " " . $current_user['email'];
                        ?>
                        
                        <p><?=$selected_user['firstname']. " ". $selected_user['lastname'];?></p>
                        <p><?=$selected_user['email']?></p>
                        <p><?=$selected_user['bio']?></p>
                        <img id="img-preview" class="profile_pic" src="<?=$selected_user['profile_pic']?>">
                        <?php
                            if($selected_user['id'] == $_SESSION['user_logged_in']) {
                        ?>
                        <p>
                            <a href="/users/edit.php" class="edit-btn"><img src="../images/edit_button.png" class="edit-btn"></a>
                        </p>
                        <?php
                            }
                        ?>
                    </div>
                </div>


                

            </div>
        </div>
    </div>

                    <div class="container-fluid pt-5">
                        <div class="row">
                            
                            <div class="card-deck">
                    <?php
                            // get all projects by this user
                            $p_model = new Project;
                            $user_projects = $p_model->get_by_user_id($selected_user['id']);
                            
                            foreach($user_projects as $user_project){
                            
                    ?>

                
                        
                            <div class="card profile_projects" style="width: 26rem;">

                                <img class="card-img-top" src="<?=$user_project['file_url']?>" alt="User Projects">

                                <div class="card-body">

                            <h5 class="card-title"><?=$user_project['title']?></h5>

                            <p class="card-text"></p>
                        
                                </div>
                            </div>

                            
                            <?php
                    }
                    ?>
                </div>
           
        </div> <!-- end of ROW -->

    </div> <!--- end of Container --->
  </div>

</div>

<img src="../images/Image 7.png" class="lego3">

<?php
    require_once("../elements/footer.php");
?>