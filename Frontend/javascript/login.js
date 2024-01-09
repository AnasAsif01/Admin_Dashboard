$(document).ready(function () {
    $("#submitlogin").click(function () {
        var password = $("#password").val();
        var email = $("#email").val();
        
        if (password == '' || email == '') {
            alert("Please fill all fields for login.");
            return false;
        }
       
         
        $.ajax({
            type: "POST",
            url: "../Backend/login.php",
            data: {
                password: password,
                email: email,
            },
            cache: false,
            success: function (data) {
           
                var response = JSON.parse(data);
                if (response.success) {
                    // Set the session and redirect
                    $.ajax({
                        type: "POST",
                        url: "./Sessions/setSession.php",
                        data: { vendorid: response.userid ,role:response.role,name:response.Name},
                        success: function(data) {                         
                            window.location.href = `http://localhost/Admin_Dashboard/Frontend/profile.php?userid=${response.userid}`;
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                } else {
                    alert(response.message);
                }
                
            },
            error: function (xhr, status, error) {
                console.error(xhr);
            }
        });
    });
});