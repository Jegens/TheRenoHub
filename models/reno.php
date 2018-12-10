<?php
class Reno extends Db {

/* ====================================
   BRINGS INFORMATION ABOUT LOGGED IN USER
   ==================================== */

    function get_by_id($id){

        $id = (int)$id;
        $sql = "SELECT * FROM renos WHERE id = '$id'";
        $reno = $this->select($sql)[0];

        return $reno;
    }

/* ====================================
   ADDS RENO TO DATABASE
   ==================================== */

    function add(){

        $title = trim($this->data['title']);
        $category = trim($this->data['category']);
        $description = trim($this->data['description']);
        $user_id = (int)$_SESSION['user_logged_in'];
        $util = new Util;
        $before_photo = $util->file_upload(APP_ROOT."/views/assets/files/", "beforeUpload");
        $after_photo = $util->file_upload(APP_ROOT."/views/assets/files/", "afterUpload");
        $post_time = time();

        $sql = "INSERT INTO renos (before_photo, after_photo, title, description, category, posted_time, user_id) VALUES ('$before_photo', '$after_photo', '$title', '$description', '$category', '$post_time', '$user_id')";

        $this->execute($sql); // puts information from form and sends it to the database
        header("Location: /projects/index.php?action=view-my-renos");
        exit();
    }

/* ====================================
   GETS RENOS FROM DATABASE
   ==================================== */

    function get_all(){

        $current_user_id = (int)$_SESSION['user_logged_in'];

        if( !empty($_GET['search']) ){// They are searching something

            $search = $this->params['search'];

            $sql = "SELECT renos.*, users.username FROM renos LEFT JOIN users ON renos.user_id = users.id WHERE renos.title LIKE '%$search%' OR renos.category LIKE '%$search%' OR users.username LIKE '%$search%' ORDER BY renos.posted_time DESC"; // ORDER BY posted_time DESC" makes it so posts are organized by their timestamp

        }elseif( $_GET['action'] == 'view-all'){
                //they are not searching for something
                $sql = "SELECT renos.*, users.username FROM renos LEFT JOIN users ON renos.user_id = users.id ORDER BY renos.posted_time DESC"; // ORDER BY posted_time DESC" makes it so posts are organized by their timestamp

            }elseif( $_GET['action'] == 'view-my-renos'){
                $sql = "SELECT renos.*, users.username FROM renos LEFT JOIN users ON renos.user_id = users.id WHERE renos.user_id='$current_user_id' ORDER BY renos.posted_time DESC"; // ORDER BY posted_time DESC" makes it so posts are organized by their timestamp
            }

        $renos = $this->select($sql);

        return $renos;

    }

/* ====================================
   EDIT
   ==================================== */

    function edit($id){

        $id = (int)$id;
        $this->check_ownership($id); //make sure user owns post that's being edited

        $title = trim($this->data['title']);
        $description = trim($this->data['description']);
        $current_user_id = (int)$_SESSION['user_logged_in'];
        $category = trim($this->data['category']);

        if( !empty($_FILES['beforeUpload']['name']) || !empty($_FILES['afterUpload']['name']) ){ // check if new file submitted

            $util = new Util;

            $before_photo_query = '';
            $after_photo_query = '';

            if( !empty($_FILES['beforeUpload']['name']) ) {
                //Delete the old project image file
                $old_project_image = trim($this->get_by_id($id)['before_photo']);
                if( !empty($old_project_image) ){
                    if( file_exists(APP_ROOT.'/views/assets/files/'.$old_project_image )){
                        unlink( APP_ROOT.'/views/assets/files/'.$old_project_image );
                    }
                }
                $filename = $util->file_upload(APP_ROOT."/views/assets/files/", "beforeUpload");
                $before_photo_query = ", before_photo='$filename'";
            }

            if( !empty($_FILES['afterUpload']['name']) ) {
                //Delete the old project image file
                $old_project_image = trim($this->get_by_id($id)['after_photo']);
                if( !empty($old_project_image) ){
                    if( file_exists(APP_ROOT.'/views/assets/files/'.$old_project_image )){
                        unlink( APP_ROOT.'/views/assets/files/'.$old_project_image );
                    }
                }
                $filename = $util->file_upload(APP_ROOT."/views/assets/files/", "afterUpload");
                $after_photo_query = ", after_photo='$filename'";
            }

            $sql = "UPDATE renos SET title='$title', description='$description', category='$category' $before_photo_query $after_photo_query WHERE id='$id' AND user_id='$current_user_id'";

            $this->execute($sql);

        }else{ // if no new file was submitted
            $sql = "UPDATE renos SET title='$title', description='$description', category='$category' WHERE id='$id' AND user_id='$current_user_id'";
            $this->execute($sql);
        }
        header("Location: /projects/index.php?action=view-my-renos");
        exit();
    }

/* ====================================
   DELETE
   ==================================== */

   function delete(){

       $current_user_id = (int)$_SESSION['user_logged_in'];
       $id = (int)$_GET['id'];
       $this->check_ownership($id);

       $current_reno = $this->get_by_id($id);
       $old_before_photo = trim($current_reno['before_photo']);
       $old_after_photo = trim($current_reno['after_photo']);


       //Delete the old project image file
       if( !empty($old_before_photo) ){
           if( file_exists(APP_ROOT.'/views/assets/files/'.$old_before_photo )){
               unlink( APP_ROOT.'/views/assets/files/'.$old_before_photo );
           }
       }

       if( !empty($old_after_photo) ){
           if( file_exists(APP_ROOT.'/views/assets/files/'.$old_after_photo )){
               unlink( APP_ROOT.'/views/assets/files/'.$old_after_photo );
           }
       }

       $sql = "DELETE FROM renos WHERE id='$id' AND user_id='$current_user_id'";

       $this->execute($sql);
   }

/* ====================================
  CHECK OWENERSHIP
  ==================================== */

    function check_ownership($id){

        $id = (int)$id;
        $sql = "SELECT * FROM renos WHERE id = '$id'";
        $reno = $this->select($sql)[0];

        if( $reno['user_id'] == $_SESSION['user_logged_in'] ){
            return true;
        }else{
            header("Location: /projects/index.php?action=view-my-renos");
            exit();
        }
    }
}
