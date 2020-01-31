<?php
    require_once("../controllers/includes.php");
    
    $title = "Home Page";
    
    require_once("elements/header.php");
    require_once("elements/nav.php");
    
    

?>






<div class="container pt-4">

    <?php
    if( empty($_SESSION['user_logged_in']) ) {
        // Show the login form
        require_once("elements/sign-up-form.php");
    } else {
        ?>

        <h1 class="welcome mx-auto">Welcome to <?=APP_NAME?></h1>

        <?php

        // Check for Alerts
        if( !empty($_SESSION['errors']) && is_array($_SESSION['errors'])) {
            foreach( $_SESSION['errors'] as $error ) {
                echo "<div class='alert alert-danger'>$error</div>";
            }

            unset($_SESSION['errors']);
        }

        ?>


        <div class="row">
            <div class="col-md-9 mx-auto pb-5">
                <div class="card mt-4 create" id="shareProjectCard">
                    <div class="card-header create-title">
                        <h4>Share your new Creation!</h4>
                    </div>
                    <div class="card-body">
                        <form action="/projects/add.php" method="post" enctype="multipart/form-data">
                            <img id="img-preview" class="w-100">
                            <div class="form-group custom-file">
                                <input class="custom-file-input" id="file-with-preview" type="file" name="fileToUpload" class="form-control" required>
                                <label class="custom-file-label">Upload Creation</label>
                            </div>
                            <div class="form-group mt-3">
                                <input class="form-control" type="text" name="title" placeholder="MOC Name" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="description" placeholder="MOC Description" required></textarea>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="post-btn"><img src="../images/post_button.png" class="post-btn"></button>
                            </div>
                        </form>
                    </div>
                </div> <!-- end of shareProjectCard -->

                <div id="projectFeed">
                <?php
                
                $p_model = new Project;
                $projects = $p_model->get_all();
                $c_model = new Comment; // Get an instance of the Comment Model

                foreach($projects as $project){
                    ?>

                    <div class="card project-post mt-3">

                        <div class="card-header">
                            <h4><a href="/users?id=<?=$project['user_id']?>"><?=$project['firstname'] . " " . $project['lastname']?></a>
                            <?php

                            if($project['user_id'] == $_SESSION['user_logged_in']) {
                                ?>
                                <span class="float-right">
                                    <a href="/projects/edit.php?id=<?=$project['id']?>"><i class="fas fa-edit"></i></a>
                                    <a href="/projects/delete.php?id=<?=$project['id']?>"><i class="fas fa-trash-alt text-warning"></i></a>
                                </span>

                                <?php
                            }

                            ?></h4>
                        </div>

                        <div class="card-img">
                            <img src="<?=$project['file_url']?>" class="img-fluid w-100">
                        </div>

                        <div class="card-body">
                            <h5><?=$project['title']?></h5>
                            <p><?=$project['description']?></p>
                            <p><small class="text-muted">Posted <?=date("M d, Y", strtotime($project['date_uploaded']))?></small></p>
                        </div>
                            
                        <div class="card-footer">
                            <?php
                                $love_class = "far";
                                if(!empty($project['love_id'])) {
                                    $love_class = 'fas';
                                }
                                ?>

                        <div class="project-meta">

                            <span class="love-btn float-right" data-project="<?=$project['id']?>">
                                <i class="<?=$love_class?> fa-heart text-danger love-icon"></i>
                                <span class="love-count"><?=$project['love_count']?></span>
                            </span>

                            <span class="float-right comment-btn mr-2">
                                <i class="far fa-comment"></i>
                                <span class="comment-count"><?php
                                    echo $c_model->get_count($project['id']);
                                ?></span>
                            </span>

                        </div> <!-- End of Project Meta Div -->

                            
                            <div class="comment-loop pt-4">

                                <?php
                                $project_comments = $c_model->get_all_by_project_id($project['id']);
                                foreach($project_comments as $user_comment) {
                                     $my_comment = ($user_comment['user_owns'] == "true" ) ? "my_comment" : "";
                                ?>

                                <div class="user-comment <?=$my_comment?>">
                                    <p>
                                        <span class="font-weight-bold comment-username"><?= $user_comment['username'] ?></span>
                                        <?= $user_comment['comment'] ?>
                                    </p>
                                </div> <!-- end of user comment -->

                                <?php
                                }
                                ?>

                            </div> <!-- end of comment loop -->
                            <hr>

                            <form class="comment-form" data-project="<?=$project['id']?>">
                                <input type="text" name="comment" placeholder="Write something..." class="form-control comment-box">
                            </form>
                                



                        </div> <!-- End of card footer -->

                    </div> <!-- End of card project-post mt-3 -->

                    <?php
                }  

                ?>
                </div>


            </div>
            <div class="col-md-12" id="searchArea">


            </div>
        </div>






        <?php
    }
    ?>

<img src="../images/Image 9.png" class="lego2">

</div>


<?php
    require_once("elements/footer.php");
?>
