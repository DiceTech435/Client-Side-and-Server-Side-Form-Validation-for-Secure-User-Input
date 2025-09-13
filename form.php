<?php
// show error
ini_set('display_errors', 1);
// Add config file
include("config.php");
?>

<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="alerts/iziToast.min.css">
<link rel="stylesheet" href="alerts/sweetalert2.min.css">
<link rel="stylesheet" href="alerts/toastr.min.css">
<link rel="stylesheet" href="css/bootstrap-icons.css">
<link rel="stylesheet" href="css/ionicons.min.css">

<form method="POST">
<h2 align="center">Register</h2>

<!-- Result from Ajax -->
<span class="result"></span>

    <!-- Success Msg -->
    <div class="success"> 
        <span class="icon">✔</span>
        <span class="successText">Success</span>
        <span class="closeSuccess">&times;</span>
    </div>

    <!-- Error Msg -->
    <div class="error"> 
        <span class="icon">⚠</span>
        <span class="errorText">Error</span>
        <span class="closeError">&times;</span>
    </div>

<input value="<?php if(!empty($_POST["username"])){echo $_POST["username"];}?>" type="text" name="username" placeholder="Username" id="username"> 
<p>
<input value="<?php if(!empty($_POST["email"])){echo $_POST["email"];}?>"  type="text" name="email" placeholder="Email" id="email">
<p>
<input value="<?php if(!empty($_POST["password"])){echo $_POST["password"];}?>"  type="password" name="password" placeholder="Password" id="password">
<p>
<button class="btn" type="submit" name="submit" id="register">Register &nbsp;<i class="bi bi-pen"></i></button>
</form>

<!-- AJAX SECTION -->
<script src="js/jquery.min.js"></script>
<script src="alerts/iziToast.min.js"></script>
<script src="alerts/sweetalert2.all.min.js"></script>
<script src="alerts/toastr.min.js"></script>

<script>

$(document).ready(function(){

//Close error
$(".closeError").click(function(){
    $(".error").fadeOut();
});

//Close success
$(".closeSuccess").click(function(){
    $(".success").fadeOut();
});


//if form is submitted
$("#register").click(function(e){

    e.preventDefault();
    // get all inputs
    let username = $("#username").val();
    let email = $("#email").val();
    let password = $("#password").val();

    if(username == ""){
        $(".errorText").html("Enter your username");
        $(".error").fadeIn();
    }
    else if(email == ""){
        $(".errorText").html("Enter your email");
        $(".error").fadeIn();
    }
    else if(password == ""){
        $(".errorText").html("Enter your password");
        $(".error").fadeIn();
    }else{

    //remove error
    $(".error").fadeOut();

    type = "registration";

    //Send Ajax request
    $.ajax({
        url: "function.php",
        type: "POST",
        data: {username:username, email:email, password:password, type:type},

            beforeSend: function(){
                //Disable the button
                $("#register").html("Processing...");
                $("#register").attr("disabled", true);
                $("#register").css({"cursor":"not-allowed", "opacity":"0.6"});
            },

            success: function(data){
                //ReEnable the button
                $("#register").html("Register");
                $("#register").attr("disabled", false);
                $("#register").css({"cursor":"pointer", "opacity":"1"});

                console.log(data);
                $(".result").html(data);
            }

        })

        }

    });

});


    // Drop form
    $(".updateBtn").click(function(){

        let id = $(this).attr("id");    //get the clicked btn id
        $("#form"+id).slideDown();      //show the form
        $(this).hide();                 //hide the update drop btn
        
    });

    // hide form
    $(".cancel").click(function(){
        $(".form").slideUp();
        $(".updateBtn").show();
    });
    
</script>


    <!-- BOOTSRAP--ERROR -->
     <?php if(!empty($error)){?>
    <div class="alert alert-danger alert-dismissible fade show align-items-center gap-2 shadow-sm border-0 rounded-3" role="alert">
        <strong class="me-1">Error! </strong> <span class="errorText"> hhhh</span>
        <button type="button" class="close ms-auto" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php }; ?>