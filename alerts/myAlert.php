<?php
include("alerts/iziToast.min.css");
include("alerts/sweetalert2.all.min.css");
include("alerts/toastr.min.css");
// CREATING HELPER CLASSES FOR IZITOASTS
    // IZITOAST
        // iziToast.success
        // iziToast.error
        // iziToast.show
        
function iziToast($type, $title, $message, $position ='topRight'){
    echo "<script>
                iziToast.$type({
                            title: '$title',
                            message: '$message',
                            color: $type === 'success' ? 'green' :  $type === 'error' ? 'red' :  $type === 'warning' ? 'orange' : 'blue',
                            position: '$position',
                            timeout: 5000,
                            buttons: [
                                        ['<button>OK</button>', function(instance, toast){
                                            instance.hide({transitionOut: 'fadeOut'}, toast);
                                        }]
                                    ],
                            progressBar: true,
                            close: true
                            });
          </script>";
}

// TYPE
    //success
    //error
    //show

// TITLE
    // Error
    // Success
    // Hey

// MESSAGE
    // Your account has been created!
    // This is a toast message
    // Could not connect to server!
    // Your profile was updated successfully!
    // This is a custom notification with a close button

// POSITIONS
    // topRight
    // topLeft
    // bottomRight
    // bottomLeft
    // center

// COLOR
    // green
    // red
    // blue

// BUTTON
    // buttons: [
    //             ['<button>OK</button>', function(instance, toast){
    //                 instance.hide({transitionOut: 'fadeOut'}, toast);
    //             }]
    //         ]

// ICON
    // fa fa-check

// TIMEOUT
    // 5000

// PROGRESSBAR
    // true
    // false

// CLOSE
    // true
    // false

// PAUSEONHOVER
    // true
    // false

// THEME
    // light













// CREATING HELPER CLASSES FOR SWEETALERTS
    // SWEETALERTS
        // swal.fire
function swal($type, $title, $text, $position){
    echo "<script>
            Swal.$type({
                        icon: '$type',
                        title: '$title' || 'ucfirst($title)',
                        text: '$text',
                        timer: 4000,
                        position: '$position',
                        timerProgressBar: true,
                        showConfirmButton: true,
                        confirmbuttonText: $title == 'success' ? 'OK' :  $title == 'error' ? 'Retry' : 'Continue'
                        });
          </script>";
}




// TYPE
    //fire
    //error
    //show

// TITLE
    // Are you sure?
    // Success

// TEXT
    // You wont be able to undo this!
    // Could not connect to server!
    // Your profile was updated successfully!
    // This is a custom notification with a close button

// ICON 
    // warning
    // success
    // error
    // info
    // question

// COLOR
    // red
    // green

// TIMER
    // 5000

// timerProgressBar
    // true
    // false

// INPUT
    // text
    // email
    // password
    // number
    // url
    // textarea
    // checkbox
    // radio
    // select

// HTML
    // input
    // button
    // 

// showCancelButton
    // true
    // false

// showCloseButton
    // true
    // false

// confirmButtonText
    // Yes, delete it


// inputPlaceholder
// customClass
// footer

// backdrop
    // true
    // false












// CREATING HELPER CLASSES FOR TOASTR
    // TOASTR
        function toastr($type, $message){
            echo "<script>
                    toastr.$type({
                                message: '$message'
                                });
                 </script>";
}

// TYPE
    // success
    // error
    // info
    // warning

// MESSAGE
    // Failed to register user

// TITLE
    // 

// POSITIONCLASS
    // toast-top-right
    // toast-bottom-right
    // toast-top-left
    // toast-bottom-left
    // toast-top-center
    // toast-bottom-center
    // toast-full-width

// closeButton
    // true
    // false

// debug
    // true
    // false

// newsOnTop
    // true
    // false

// ProgressBar
    // true
    // false

// PreventDuplicates
    // true
    // false

// onclick

// timeOut
    // 5000

// showMethod
    // fadeIn
    // slideDown

// hideMethod
    // fadeOut
    // slideUp

// extendedTimeOut
// showDuration
// hideDuration











include("alerts/iziToast.min.js");
include("alerts/sweetalert2.all.min.js");
include("alerts/toastr.min.js");