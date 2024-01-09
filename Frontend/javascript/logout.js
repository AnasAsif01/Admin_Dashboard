
function logout() {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "./Sessions/destroysession.php", true);
    xhr.send();
}