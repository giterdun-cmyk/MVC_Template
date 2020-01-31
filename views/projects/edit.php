<?php
    require_once("../../controllers/includes.php");

if( !empty($_GET['id']) ) {

    $p_model = new Project; // Start Project model
    $project = $p_model->get_by_id($_GET['id']);

    if( !empty($_POST) ) {
        $p_model->edit($_GET['id']);
        header('Location: /');
        exit;
    }

} else {
    header("Location: /");
    exit;
}


    require_once('../elements/header.php');
    require_once('../elements/nav.php');
?>

<div class="container pt-4 pb-4">

    <div class="row">
        <div class="col-md-9 mx-auto pb-5">
            <div class="card mt-4 create" id="shareProjectCard">
                <div class="card-header create-title">

                    <h4>Edit Project</h4>
                </div>

                <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                        <img id="img-preview" class="w-100" src="<?=$project['file_url']?>">

                            <div class="form-group custom-file">
                                <input class="custom-file-input" id="file-with-preview" type="file" name="fileToUpload" class="form-control">

                                <label class="custom-file-label">Edit Creation</label>
                            </div>

                            <div class="form-group mt-3">
                                <input class="form-control" type="text" name="title" placeholder="MOC Name" value="<?=$project['title']?>" required>
                            </div>

                            <div class="form-group mt-3">
                                <textarea class="form-control" name="description" placeholder="MOC Description" required><?=$project['description']?></textarea>
                            </div>

                            <div class="editBack">
                                <button type="submit" class="back-btn"><img src="../images/back_button.png" class="back-btn"></button>
                    
                   
                                <button type="submit" class="update-btn float-right"><img src="../images/updatemoc_button.png" class="update-btn"></button>
                            </div>
                    </form>
                </div>
         </div>
    </div>
</div>



<?php
    require_once('../elements/footer.php');


?>