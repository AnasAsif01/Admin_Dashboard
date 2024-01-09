$(document).ready( function () {
    var userid = getParameterByName('userid');

    $.ajax({
        type: "POST",
        url: "../Backend/getuserprofile.php",
        data: {
            userid: userid,
        },
        cache: false,
        success: function (data) {
            var element = JSON.parse(data);
            console.log(element);
            document.getElementById('profilename').textContent = element[0].Name;
            document.getElementById('profileemail').textContent = element[0].Email;
            document.getElementById('profilename').textContent = element[0].Name;
        },
        error: function (xhr, status, error) {
            console.error(xhr);
        }
    });

    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }

} );
