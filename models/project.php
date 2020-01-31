<?php

class Project extends DB {


    /*
     *
     * get_all()
     * Get all projects from the database
     * @return array
     * 
     */

    public function get_all() {

        if(APP_DEBUG) echo 'get_all()<br>';

        $user_id = (int)$_SESSION['user_logged_in'];

        if( !empty($_GET['search']) ) {
            $search_query = $this->params['search'];
            $sql_where = "WHERE projects.title LIKE '%$search_query%'
                          OR CONCAT(users.firstname,'',users.lastname) LIKE '%$search_query%'
                          OR users.username LIKE '%$search_query%' ";
        } else {
            $sql_where = '';
        }

        $sql = "SELECT projects.*, 
                       users.firstname, users.lastname, users.username,
                       loves.id AS love_id, 
                       (SELECT COUNT(loves.id) FROM loves WHERE loves.project_id = projects.id ) AS love_count
                FROM projects
                LEFT JOIN users
                ON projects.user_id = users.id
                LEFT JOIN loves
                ON projects.id = loves.project_id AND loves.user_id = $user_id
                $sql_where
                ORDER BY projects.date_uploaded DESC";

        $projects = $this->select($sql);

        return $projects;

    }

    public function get_by_id($id) {

        if(APP_DEBUG) echo 'get_by_id()<br>';


        $sql = "SELECT * FROM projects WHERE id = $id";

        $project = $this->select($sql)[0];

        return $project;

    }

    /*
     *
     * get_by_id()
     * Get a project by the User ID
     * @param $user_id
     * @return array
     * 
     */

    public function get_by_user_id($user_id) {

        if(APP_DEBUG) echo 'get_by_user_id()<br>';

        $user_id = (int)$user_id; // check that value is an integer

        $sql = "SELECT * FROM projects WHERE user_id = $user_id";

        $project = $this->select($sql);

        return $project;

    }
    




    /*
     *
     * add()
     * Add new project to the database
     * return null
     * 
     */

    public function add() {

        if(APP_DEBUG) echo 'add()<br>';

        $title = $this->data['title'];
        $description = $this->data['description'];
        $user_id = (int)$_SESSION['user_logged_in'];
        $current_time = date("Y-m-d H:i:s", time());

        $util = new Util;
        // Use the file_upload method of Util class to upload our image file
        $file_upload = $util->file_upload();
        $filename = $file_upload['filename'];

        if( $file_upload['file_upload_error_status'] == 0 ){
            $sql = "INSERT INTO projects (title, description, date_uploaded, user_id, file_url) 
                    VALUES ('$title', '$description', '$current_time', '$user_id', '$filename')";

            $this->execute($sql);
        }
    }

    /*
     *
     * edit()
     * Edit project in the database
     * @param $project_id
     * @return void
     * 
     */

    public function edit($project_id) {
        
        if(APP_DEBUG) echo 'edit()<br>';

        $project_id = (int)$project_id;
        $this->check_ownership($project_id);

        // Process form data and update database
        $title = $this->data['title'];
        $description = $this->data['description'];
        $current_user_id = (int)$_SESSION['user_logged_in'];

        // is their and image
        if (!empty($_FILES['fileToUpload']['name'] ) ) {

            $util = new Util;
            $file_upload = $util->file_upload();
            $filename = $file_upload['filename'];

            if( $file_upload['file_upload_error_status'] == 0 ){
                
                // Get the old file
                $old_filename = $this->get_by_id($project_id)['file_url'];

                // Delete the old photo
                if( !empty($old_filename) ){
                    if( file_exists( APP_ROOT . '/views' . $old_filename) ) {
                        unlink( APP_ROOT . '/views' . $old_filename );
                    }
                }

                $sql = "UPDATE projects 
                        SET title = '$title', description = '$description', file_url = '$filename'
                        WHERE id = $project_id AND user_id = $current_user_id";
                        
                $this->execute($sql);
            }

        } else { // If no new image, just new text

            $sql = "UPDATE projects 
                    SET title = '$title', description = '$description'
                    WHERE id = $project_id AND user_id = $current_user_id";

            $this->execute($sql);
        }

    }



    /*
     *
     * delete()
     * Delete project from the database
     * @return void
     * 
     */

    public function delete() {

        if(APP_DEBUG) echo 'delete()<br>';
    
        $current_user_id = (int)$_SESSION['user_logged_in'];
        $project_id = (int)$_GET['id'];

        $this->check_ownership($project_id);

        $project_image = $this->get_by_id($project_id)['file_url'];
        if(!empty($project_image)) {
            if( file_exists( APP_ROOT . '/views' . $project_image ) ){
                unlink( APP_ROOT . '/views' . $project_image );

            }
        }

        $sql = "DELETE FROM projects WHERE id = $project_id AND user_id = $current_user_id";
        $this->execute($sql);

    }

    /*
     * check_ownership()
     * Check if user is the owner of the project
     * @param $project_id
     * @return boolean
     * 
     */ 

    public function check_ownership($project_id) {

        if(APP_DEBUG) echo 'check_ownership()<br>';

        $project_id = (int)$project_id;

        $sql = "SELECT * FROM projects WHERE id = $project_id";
        $project = $this->select($sql)[0];

        if( $project['user_id'] == $_SESSION['user_logged_in'] ){
            return true;
        } else {
            header('Location: /');
            exit();
        }
    }

}

?>