
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
            cache: false,
            success: function (data) {
                setTimeout(function () {
                    window.location.href = 'http://localhost/Admin_Dashboard/Frontend/login.php';

                }, 2000);
            },
            error: function (xhr, status, error) {
                console.error(xhr);
            }
        });
    });
});
