function deleteUser(id_user) {
    var xhttp;
    var params = "id_user=" + id_user.toString();
    xhttp = new XMLHttpRequest();

    xhttp.open("POST", "deleteUser.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = setTimeout(showUsers, 500);
    xhttp.send(params);
}

function showUsers() {

    document.getElementById("userTable").innerHTML = "";
    xhttp = new XMLHttpRequest();
    xhttp.open("GET", "showUsers.php", true);
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("userTable").innerHTML = this.responseText;
        }
    }
    xhttp.send();
}