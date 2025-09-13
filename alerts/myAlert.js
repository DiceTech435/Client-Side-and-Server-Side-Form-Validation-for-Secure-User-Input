// CREATING HELPER CLASSES FOR IZITOASTS
    // IZITOAST
        // iziToast.success
        // iziToast.error
        // iziToast.show
//iziToast('Error', 'Your account has been created!', 'topRight');
function iziToast(title, message, position){
                iziToast.success({
                            title: title,
                            message: message,
                            color:'green',
                            position: position,
                            timeout: 5000,
                            buttons: [
                                        ['<button>OK</button>', function(instance, toast){
                                            instance.hide({transitionOut: 'fadeOut'}, toast);
                                        }]
                                    ],
                            progressBar: true,
                            close: true
                            });
}
    iziToast.success({
        title: 'OK',
        message: 'Your profile was updated successfully',
        color: 'blue',
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



// TYPE
    //success
    //error
    //show

// TITLE
    // Error
    // Success
    // Hey
    // OK

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
            function Swal(type, title, text, position){
                        Swal.fire({
                                    icon: type,
                                    title: title || title.charAt(0).toUpperCase()+title.slice(1),
                                    text: text,
                                    timer: 4000,
                                    position: position,
                                    timerProgressBar: true,
                                    showConfirmButton: true,
                                    confirmbuttonText: title == 'Success' ? 'OK' :  title == 'Error' ? 'Retry' : 'Continue',
                                    showCloseButton: true,
                                    showCancelButton: true,
                                    backdrop: true,
                                    inputPlaceholder: 'Hello here',
                                    // timer: 5000,
                                    color: type == 'success' ? 'green' :  type == 'error' ? 'red' : 'blue',
                                    timerProgressBar: true    
                                });
            }

// MORE 
            Swal.fire({
                title:'Delete User',
                text: 'Are you sure? this action cannot be undone ',
                icon: 'warning',
                color: 'red',
                confirmButtonText: 'Yes, delete',
                html: '<button class="swalDel">Yes, delete!</button>',
                // confirmButtonText: true,
                showCloseButton: true,
                showCancelButton: true,
                backdrop: true,
                inputPlaceholder: 'Hello here',
                // timer: 5000,
                timerProgressBar: true
            });

            Swal.fire({
                title:'Error',
                text: 'Something went wrong, please try again.',
                icon: 'error',
                confirmbuttonText: 'Retry'
            });

            Swal.fire({
				title:'Delete Post?',
				icon: 'waring',
				showCancelButton: true,
				confirmButtontext: 'yes, delete it'
                    }).then(result => {
                        if(result.isConfirmed){
                            //simulate toastr
                            toastr.success('Post deleted successfully!');
                        }
			});

// TYPE
    //fire

// TITLE
    // Are you sure?
    // Success
    // Error

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
        function toastr(message){
                    toastr.error({
                                message: message
                    });
}
// MORE
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "progressBar": true,
        "positionClass":"toast-top-center",
        "timeOut": "3000",
        "preventDuplicates": true,
        "showMethod": "slideDown",
        "hideMethod":"slideUp"
    };

    toastr.option.showDuration = 500;
    toastr.option.hideDuration = 1000;
    toastr.option.showEasing = "swing";
    toastr.option.hideEasing = "linear";

// TYPE
    // success
    // error
    // info
    // warning

// MESSAGE
    // 

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




