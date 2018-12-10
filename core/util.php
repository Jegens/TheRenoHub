<?php
class Util {

    function startsWith($haystack, $needle){
         $length = strlen($needle);
         return (substr($haystack, 0, $length) === $needle);
     }

     function file_upload($target_dir = APP_ROOT."/views/assets/files/", $inputNameAttr = "fileToUpload"){

        if( !empty($_FILES[$inputNameAttr]["name"]) ){

            sleep(1);

            $filename = time() . basename($_FILES[$inputNameAttr]["name"]);
            $target_file = $target_dir . $filename;
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES[$inputNameAttr]["tmp_name"]);
                if($check !== false) {
                    // echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }
            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }
            // Check file size
            if ($_FILES[$inputNameAttr]["size"] > 5000000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES[$inputNameAttr]["tmp_name"], $target_file)) {
                    // echo "The file ". basename( $_FILES[$inputNameAttr]["name"]). " has been uploaded.";
                    return $filename;
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }

        }  //END IF FILE WAS SUBMITTED IN THE FORM

        return '';



     }

}
