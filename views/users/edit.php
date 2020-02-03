<?php
    require_once("../../controllers/includes.php");
    
    // If the form was submitted
    if( !empty($_POST) ){
        $user->edit();
        header("Location: /users/");
        exit;
    }



    $title = "Editing ".$current_user['username'];
    
    require_once("../elements/header.php");
    require_once("../elements/nav.php");
    
    
?>

        

<div class="container pt-4 pb-4">
<div class="card edit_card">
<div class="card-body">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h2 class="pt-3">EDIT PROFtLE</h2>
            
            <form method="post" enctype="multipart/form-data">
                <div class="pt-3">

                    <img id="img-preview" class="w-100" src="<?=$current_user['profile_pic']?>">
                    
                    <div class="form-group custom-file">
                        <input class="custom-file-input " id="file-with-preview" type="file" name="fileToUpload" class="form-control">
                        <label class="custom-file-label">Edit Photo</label>
                    </div>
    
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input id="username" 
                               type="text" 
                               name="username" 
                               class="form-control" 
                               value="<?=$current_user['username']?>">
                    </div>

                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input id="password" 
                               type="text" 
                               name="password" 
                               class="form-control" 
                               value="">
                    </div>

                    <div class="form-group">
                        <label for="password2">Confirm New Password</label>
                        <input id="password2" 
                               type="text" 
                               name="password2" 
                               class="form-control" 
                               value="">
                    </div>

                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input id="firstname" 
                               type="text" 
                               name="firstname" 
                               class="form-control" 
                               value="<?=$current_user['firstname']?>">
                    </div>


                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input id="lastname" 
                               type="text" 
                               name="lastname" 
                               class="form-control" 
                              value="<?=$current_user['lastname']?>">
                    </div>

                    <div class="form-group">
                        <label for="bio">Bio</label>
                        <textarea id="bio" 
                                  type="text" 
                                  name="bio" 
                                  class="form-control" 
                                  ><?=$current_user['bio'];?></textarea>
                    </div>

                    <div class="editBack pl-5">
                        <button type="submit" class="back-btn"><img src="../images/back_button.png" class="back-btn"></button>
                    
                   
                        <button type="submit" class="update-btn"><img src="../images/update_button.png" class="update-btn"></button>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>
</div>
</div> <!-- End of Container -->




<?php
    require_once("../elements/footer.php");
?>