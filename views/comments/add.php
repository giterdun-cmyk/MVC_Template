<?php
    require_once("../../controllers/includes.php");


    $comment_data = array(
        'error' => true
    );

    // If the comment form submitted and projecT_id is set
    if( !empty($_POST['project_id']) ) {

        // add new comment to database
        $c_model = new Comment;
        $comment_data = $c_model->add($comment_data);
    }

    echo json_encode($comment_data);

    die();
