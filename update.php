<?php
// show error
ini_set('display_errors', 1);
// Add config file
include("config.php");
    if(!isset($_GET["userid"])){
     header("location:dashboard.php");
}
else{

//Get user id
$userid = $_GET["userid"];

// Get user info based on the id 
$stmt = $pdo->prepare("SELECT * FROM users WHERE userid = :userid");
$stmt->bindParam(":userid", $userid, PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch();
}
?>

<!-- <meta name="viewport" content="width=device-width, initial-content=1"> -->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="alerts/iziToast.min.css">
<link rel="stylesheet" href="alerts/sweetalert2.min.css">
<link rel="stylesheet" href="alerts/toastr.min.css">
<link rel="stylesheet" href="css/bootstrap-icons.css">
<link rel="stylesheet" href="css/ionicons.min.css">

<form method="POST">

    <!-- <h2>My Profile</h2> -->

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

    <input value="<?php if(!empty($_POST["username"])){echo $_POST["username"];}else{echo $user["username"];}?>" type="text" placeholder="Username" id="username">
    <p>
    <input value="<?php if(!empty($_POST["email"])){echo $_POST["email"];}else{echo $user["email"];}?>"  type="text" placeholder="Email" id="email">
    <p>
    <input value="<?php if(!empty($_POST["status"])){echo $_POST["status"];}else{echo $user["status"];}?>" type="text" placeholder="Status" disabled>

    <p>
    <button type="submit" class="btn update" id="update_<?= intval($userid);?>" >Update User &nbsp; <i class="bi bi-pencil-square"></i></button>
    <p>

    <!-- Redirection-back to dashboard should be done in function.php instead after successful update -->
    <!-- <?php if(isset($success)){?>
        <a href="dashboard.php" class="link">Go Back</a>
    <?php }?> -->

</form>

<!-- Scripts -->
<script src="js/jquery.min.js"></script>
<script src="alerts/sweetalert2.all.min.js"></script>
<script src="alerts/iziToast.min.js"></script>
<script src="alerts/toastr.min.js"></script>
<script src="js/bootstrap4.bundle.min.js"></script>

<script>

$(document).ready(function(){

    //Close error
    // $(".closeError").click(function(){
    //     $(".error").fadeOut();
    // });

    // //Close success
    // $(".closeSuccess").click(function(){
    //     $(".success").fadeOut();
    // });

    // // Drop form ----- but for this project, i will be redirecting to another page for the update.
    // $(".updateBtn").click(function(){
    //     let id = $(this).attr("id");    //get the clicked btn id
    //     $("#form"+id).slideDown();      //show the form
    //     $(this).hide();                 //hide the update drop btn  
    // });

    // // Hide form
    // $(".cancel").click(function(){
    //     $(".form").slideUp();
    //     $(".updateBtn").show();
    // });


//UPDATE HERE
$(".update").click(function(e){

    e.preventDefault();
    // Remove the "_" mark from del_<user['userid']>
    // let ID = $(this).attr("id");
    let ID = this.id;
    let userid = ID.split("_");
    let updateid = userid[1];

    let username = $("#username").val();
    let email = $("#email").val();

    if(username == ""){
        $(".errorText").html("Enter username");
        $(".error").fadeIn();
    }
    else if(email == ""){
        $(".errorText").html("Enter email");
        $(".error").fadeIn();
    }
    else{

        $(".error").fadeOut();

        type = "update";

    //Send Ajax request
    $.ajax({
        url: "function.php",
        type: "POST",
        data: {username:username, email:email, updateid:updateid, type:type},
        beforeSend: function(){
            //Disable the button
            $("#update_"+updateid).html("Updating...");
            $("#update_"+updateid).attr("disabled", true);
            $("#update_"+updateid).css({"cursor":"not-allowed", "opacity":"0.6"});
        },

        success: function(data){
            //ReEnable the button
            $("#update_"+updateid).html("Update");
            $("#update_"+updateid).attr("disabled", false);
            $("#update_"+updateid).css({"cursor":"pointer", "opacity":"1"});
            
            console.log(data);
            $(".result").html(data);
        }

        });

        }

    });

});

</script>