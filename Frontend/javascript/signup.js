$(document).ready(function () {
    $("#submit").click(function () {
        var name = $("#name").val();
        var password = $("#spassword").val();
        var email = $("#semail").val();
        var role = $("#role").prop("checked") ? 1 : 0;


        if (name == '' || password == '' || email == '') {
            alert("Please fill all fields.");
            return false;
        }

        $.ajax({
            type: "POST",
            url: "../Backend/signup.php",
            data: {
                name: name,
                password: password,
                email: email,
                role: role,
            },
            success: function (data) {
                    if (data == "EmailExists") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Email already exists',
                            text: 'Please choose a different email.',
                        }); 
                    } else {
                        setTimeout(function () {
                            window.location.href = 'http://localhost/Admin_Dashboard/Frontend/login.php';
        
                        }, 1000);
                    }
                                          
            },
            error: function (xhr, status, error) {
                console.error(xhr);
            }
        });
    });
});
