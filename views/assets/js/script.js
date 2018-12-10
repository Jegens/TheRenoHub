var editPasswordsMatch = true;

$(document).ready(function(){

    $("#edit-user-form").submit(function(e){
        if (editPasswordsMatch == false) {
            e.preventDefault();
        }
    });

/* ====================================
   VERIFY PASSWORD CHECK
   ==================================== */

   $('#password-verification').keyup(checkPasswordMatch);
   $('#password').keyup(checkPasswordMatch);

/* ====================================
   SWITCH BETWEEN LOGIN AND SIGNUP SECTIONS
   ==================================== */

    $('#signup-alt-btn').click(function(){

        $('#login-container').hide();
        $('#signup-container').show();
    });

    $('#login-alt-btn').click(function(){
        $('#signup-container').hide();
        $('#login-container').show();
    });

    $('.del-icon').click(function(){

        if( !confirm('Are you sure you want to delete this?') ){
            return false;
        }
    });

}); // END DOCUMENT READY

//Check to see on edit an account if passwords match using keyup
function checkPasswordMatch() {
    var password1 = $('#password').val();
    var password2 = $('#password-verification').val();




    if( password1 != password2) {
        editPasswordsMatch = false;
        $(".verification-signal").css({ "border": "1px solid  #b51818"});
    }else{
        editPasswordsMatch = true;
        $(".verification-signal").css({ "border": "1px solid #28a745"});
    }
}

function previewFile() {

    var preview = document.getElementById('img-preview');
    var file = document.getElementById('file-with-preview').files[0];

    var reader = new FileReader();
    reader.onloadend= function(){
        preview.src = reader.result;
    }

    if(file) {
        reader.readAsDataURL(file);
    }else{
        preview.src = "";
    }
}

function previewFileBefore() {

    var preview = document.getElementById('img-preview-before');
    var file = document.getElementById('file-with-preview-before').files[0];

    var reader = new FileReader();
    reader.onloadend= function(){
        preview.src = reader.result;
    }

    if(file) {
        reader.readAsDataURL(file);
    }else{
        preview.src = "";
    }
}

function previewFileAfter() {

    var preview = document.getElementById('img-preview-after');
    var file = document.getElementById('file-with-preview-after').files[0];

    var reader = new FileReader();
    reader.onloadend= function(){
        preview.src = reader.result;
    }

    if(file) {
        reader.readAsDataURL(file);
    }else{
        preview.src = "";
    }
}
