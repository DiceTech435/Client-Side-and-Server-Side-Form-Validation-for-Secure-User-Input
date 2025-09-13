<?php
// show error
ini_set('display_errors', 1);
include("config.php");
?>

<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="alerts/iziToast.min.css">
<link rel="stylesheet" href="alerts/sweetalert2.min.css">
<link rel="stylesheet" href="alerts/toastr.min.css">
<link rel="stylesheet" href="css/bootstrap4.min.css">
<link rel="stylesheet" href="css/bootstrap-icons.css">
<link rel="stylesheet" href="css/ionicons.min.css">
                              
                                          <!-- USERS LIST -->
                                        <h2>REGISTERED USERS</h2>
<span class="result"></span>
<table border cellpadding='25' class='table'>
    <tr>
        <th>S/N</th>
        <th>Username</th>
        <th>Email</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
            <?php
            //Select all users in DB  - (R)
            $stmt = $pdo->prepare("SELECT * FROM users");
            $stmt->execute();
            $users = $stmt->fetchAll();
            $count = 1;
            foreach($users as $user){
            ?>
    <tr id="userRow_<?php echo $user['userid'];?>">
        <td><?php echo $count++;?></td>
        <td><?php echo $user["username"];?></td>
        <td><?php echo $user["email"];?></td>
        <td><?php echo $user["status"];?></td>
        <td>
            <div class="btns">
            <a href="update.php?userid=<?= $user["userid"];?>" ><button class="btn-m btn-success"> <i class="bi bi-pencil-square"></i> Update User</button></a>
            <a><button data-toggle="modal" class="btn-m btn-danger" data-target="#delModal<?php echo $user['userid'];?>">
            <i class="bi bi-trash"></i> Delete User</button></a>
            </div>
        </td>
    </tr>
    <?php }; ?>
</table>

        <!-- Delete Modal -->
         <?php foreach($users as $user){?>
        <div class="modal fade" id="delModal<?php echo $user['userid'];?>">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Delete User</h4>
        <button type="button" class="close" id="close<?php echo $user['userid'];?>" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
        </div>
        <div class="modal-body">
        <p>Are you sure you want to permanently delete <b id="delName"><?php echo htmlspecialchars($user['username']);?> ? </b></p>
        </div>
        <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger delete" id="del_<?php echo $user['userid'];?>">
        Yes, delete <span class="spinner-border spinner-border-sm ml-3 display-none" id="load<?php echo $user['userid'];?>"></span>
        </button>
        </div>
        </div>
        </div>
        </div>
        <?php }; ?>


<!-- Scripts -->
<script src="js/jquery.min.js"></script>
<script src="alerts/sweetalert2.all.min.js"></script>
<script src="alerts/iziToast.min.js"></script>
<script src="alerts/toastr.min.js"></script>
<script src="js/bootstrap4.bundle.min.js"></script>

<script>

// AJAX REQUESTS HERE
$(document).ready(function(){

// DELETE USERS
$(".delete").click(function(){

    // Remove the "?" mark from the username
    let name = $("#delName").html();
    let delName = name.replace("?", "").trim();

    // Remove the "_" mark from del_<user['userid']>
    // let ID = $(this).attr("id");
    let ID = this.id;
    let userid = ID.split("_");
    let delid = userid[1];
    
    let type = "delete";

    $.ajax({
        url: "function.php",
        method: "POST",
        data: {delName:delName, delid:delid, type:type},
        beforeSend: function(){$("#load"+delid).removeClass("display-none"); $("#del_"+delid).prop('disabled', true)},
        success: function(data){
          $("#load"+delid).addClass("display-none"); 
          $("#del_"+delid).prop('disabled', false);
          $("#close"+delid).trigger('click');

            // FadeOut User Row here or in Function
            // if(data){
            // $("#userRow_"+delid).fadeOut(function(){
            // $("#userRow_"+delid).remove();
            // });
            // }

            console.log(data);
            $(".result").html(data);
        }
    })
  
});


});

</script>
