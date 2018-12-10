<?php
class User extends Db {

/* ====================================
   BRINGS INFO ABOUT LOGGED IN USER
   ==================================== */

    function get_by_id($id){

        $id = (int)$id;
        $sql = "SELECT * FROM users WHERE id = '$id'";
        $user = $this->select($sql)[0];
        return $user;
    }

    function count_renos($id){
        $id = (int)$id;
        $sql = "SELECT COUNT(*) FROM renos WHERE user_id = '$id'";
        $renos_count = $this->select($sql)[0]['COUNT(*)'];
        return $renos_count;

    }

/* ====================================
   ADDS USER TO DATABASE
   ==================================== */

    function add(){

        $_SESSION = array(); // Empty session and start fresh

        $util = new Util;
        // same as $username = $_POST['username'] but has mysqli security built in to it
        $username = trim($this->data['username']);
        // $password contains hashed version of what user typed in
        $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
        $email = trim($this->data['email']);
        $profile_pic = $util->file_upload(APP_ROOT."/views/assets/files/", "profilePic");
        $member_since = time();

        $sql = "INSERT INTO users (username, password, email, profile_pic, member_since) VALUES ('$username', '$password', '$email', '$profile_pic', '$member_since')";

        // puts information from form and sends it to the database
        $new_user_id = $this->execute_return_id($sql);

        return $new_user_id;
    }

/* ====================================
   CHECK TO SEE IF USER IS IN DATABASE
   ==================================== */

    function exists(){

        $username = $this->data['username'];

        $sql = "SELECT * FROM users WHERE username = '$username'";

        $user = $this->select($sql);

        return $user;
    }

/* ====================================
   LOG IN
   ==================================== */

    function login(){

        // Get the users details from the db and store it in a define_syslog_variable
        $username = $this->data['username'];

        $sql = "SELECT * FROM users WHERE username = '$username'";

        $user = $this->select($sql)[0];

        // Check if password matches from form to db
        if( password_verify($_POST['password'], $user['password']) ){

            $_SESSION['user_logged_in'] = $user['id'];

            header("Location: /");

        }else{ // Login attempt failed
            $_SESSION['login_attempt_msg'] = '<p class="text-danger">*** Incorrect Username or Password ***</p>';

            header("Location: /users/index.php?action=login");
        }
    }

/* ====================================
   EDIT
   ==================================== */

    function edit(){

        $util = new Util;
        $id = (int)$_SESSION['user_logged_in'];
        $firstname = trim($this->data['firstname']);
        $lastname = trim($this->data['lastname']);
        $age = trim($this->data['age']);
        if (empty($age)) {
            $age = 'NULL';
        }else{
            $age = (int)$age;
        }
        $occupation = trim($this->data['occupation']);
        $location = trim($this->data['location']);
        $profile_pic = $util->file_upload(APP_ROOT."/views/assets/files/", "profilePic");
        $password = password_hash(trim($this->data['password']), PASSWORD_DEFAULT);

        if( !empty(trim($_POST['password'])) ){ // New password entered

            $sql = "UPDATE users SET password='$password', firstname='$firstname', lastname='$lastname', age=$age, occupation='$occupation', location='$location', profile_pic='$profile_pic' WHERE id='$id'";

        }else{ // No new password entered

            $sql = "UPDATE users SET firstname='$firstname', lastname='$lastname', age=$age, occupation='$occupation', location='$location', profile_pic='$profile_pic' WHERE id='$id'";

        }

        $this->execute($sql);
    }

/* ====================================
   DELETE PHOTO
   ==================================== */

    function delete_user_photo(){

        $current_user_id = (int)$_SESSION['user_logged_in'];
        $current_user = $this->get_by_id($id);
        $old_profile_pic = trim($current_user['profile_pic']);

        //Delete the old project image file
        if( !empty($old_profile_pic) ){
            if( file_exists(APP_ROOT.'/views/assets/files/'.$old_profile_pic )){
               unlink( APP_ROOT.'/views/assets/files/'.$old_profile_pic );
            }
        }

        $sql = "DELETE FROM users WHERE user_id='$current_user_id'";

        $this->execute($sql);
    }

}
