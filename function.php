<?php include "config.php"; ?>

<?php
// REGISTER USERS
if($_POST["type"] == "registration"){
    // validate username
    if(empty($_POST["username"])){
        echo "<script>
                $('.errorText').html('Enter your username');
                $('.error').fadeIn();
              </script>";
    }
    elseif(!preg_match("/^[a-zA-Z]+$/", $_POST["username"])){
        echo  "<script>
                $('.errorText').html('Invalid username, only letters allowed');
                $('.error').fadeIn();
              </script>";
    }
    elseif(strlen($_POST["username"]) < 3){
        echo "<script>
                $('.errorText').html('Username must be upto 3 characters');
                $('.error').fadeIn();
              </script>";
    }
    // validate email
    elseif(empty($_POST["email"])){
        echo "<script>
                $('.errorText').html('Enter your email');
                $('.error').fadeIn();
              </script>";
    }
    elseif(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
        echo "<script>
                $('.errorText').html('Enter a valid email address');
                $('.error').fadeIn();
              </script>";
    }
    // validate password
    elseif(empty($_POST["password"])){
        echo "<script>
                $('.errorText').html('Enter your password');
                $('.error').fadeIn();
              </script>";
    }
    elseif(strlen($_POST["password"]) < 6){
        echo "<script>
                $('.errorText').html('Password must be upto 6 characters');
                $('.error').fadeIn();
              </script>";
    }
    else{

        $username = htmlspecialchars($_POST["username"]);
        $username = ucfirst($username);
        $email = htmlspecialchars($_POST["email"]);
        $password = htmlspecialchars($_POST["password"]);


        // INSERT STATEMENT  - (C)
        $status = "User";
        $stmt = $pdo->prepare("INSERT INTO users(username, email, status, password) VALUES (:username, :email, :status, :password)");
        $stmt->bindParam(":username", $username, PDO::PARAM_STR);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":status", $status, PDO::PARAM_STR);
        $stmt->bindParam(":password", $password, PDO::PARAM_STR);
        $stmt->execute();

            if($stmt){
            // Show Custom Scuccess message
            // Show IziToast Success Message
            // Clear all Input values
            // Redirect if everything is fine
            // Fade out success message
            echo 
                "<script>{
                    $('.successText').html('Success: Registered successfully');
                    $('.success').fadeIn();

                    iziToast.success({
                        title: 'Success:',
                        message: 'Registered successfully, redirecting....',
                        color: 'green',
                        position: 'topRight',
                        timeout: 5000,
                        buttons: [
                                    ['<button>OK</button>', function(instance, toast){
                                        instance.hide({transitionOut: 'fadeOut'}, toast);
                                    }]
                                 ],
                        progressBar: true,
                        close: true
                    });

                    $('#username').val('');
                    $('#email').val('');
                    $('#password').val('');

                    setTimeout(()=>{
                        location.href='dashboard.php'
                        $('.success').fadeOut();
                    }, 4500);}

                        </script>";
                    };
    };
};









// UPDATE USERS
if($_POST["type"] == "update"){
    // validate username
    if(empty($_POST["username"])){
        echo "<script>
        $('.errorText').html('Enter username');
        $('.error').fadeIn();
        </script>";
    }
    elseif(!preg_match("/^[a-zA-Z]+$/", $_POST["username"])){
        echo "<script>
        $('.errorText').html('Invalid username');
        $('.error').fadeIn();
        </script>";
    }
    elseif(strlen($_POST["username"]) < 3){
        echo "<script>
        $('.errorText').html('Username must be upto 3 characters');
        $('.error').fadeIn();
        </script>";
    }
    // validate email
    elseif(empty($_POST["email"])){
        echo "<script>
        $('.errorText').html('Enter email');
        $('.error').fadeIn();
        </script>";
    }
    elseif(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
        echo "<script>
        $('.errorText').html('Invalid email');
        $('.error').fadeIn();
        </script>";
    }
    else{

        $username = htmlspecialchars($_POST["username"]);
        $email = htmlspecialchars($_POST["email"]);
        $updateid = intval($_POST["updateid"]);

        // UPDATE STATEMENT  - (C)
        $stmt = $pdo->prepare("UPDATE users SET username=:username, email=:email WHERE userid = :userid");
        $stmt->bindParam(":username", $username, PDO::PARAM_STR);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":userid", $updateid, PDO::PARAM_INT);
        $stmt->execute();

        if($stmt){
        // Show Custom Scuccess message
        // Show IziToast Success Message
        // Redirect if everything is fine
        // Fade out success message
        echo 
            "<script>{
                $('.successText').html('Success: User updated successfully');
                $('.success').fadeIn();

                iziToast.success({
                    title: 'Success:',
                    message: 'Updated successfully, back to dashboard....',
                    color: 'green',
                    position: 'topRight',
                    timeout: 5000,
                    buttons: [
                                ['<button>OK</button>', function(instance, toast){
                                    instance.hide({transitionOut: 'fadeOut'}, toast);
                                }]
                                ],
                    progressBar: true,
                    close: true
                });

                setTimeout(()=>{
                    location.href='dashboard.php'
                    $('.success').fadeOut();
                }, 4500);}

                    </script>";
                };

    };

};













// DELETE USER
if($_POST["type"] == "delete"){

    $delid = intval($_POST["delid"]);
    $delName = htmlspecialchars($_POST["delName"]);

    $stmt = $pdo->prepare("DELETE FROM users WHERE userid = :userid");
    $stmt->bindParam(":userid", $delid, PDO::PARAM_INT);
    $stmt->execute();

    if($stmt){
        //Show SweetAlert
        // FadeOut User Row
        echo "<script>
                Swal.fire({
                    title: `$delName deleted `,
                    text: `$delName was deleted successfully`,
                    icon: 'success',
                    color: 'green',
                    showCloseButton: true,
                    showCancelButton: true,
                    backdrop: true,
                    // timer: 5000,
                    timerProgressBar: true
                });
                
                $('#userRow_$delid').fadeOut(function(){
                $('#userRow_$delid').remove();
                });

          </script>";
    };
};