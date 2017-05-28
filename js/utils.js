function post(path, params, method) {
    method = method || "post"; // Set method to post by default if not specified.

    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    for (var key in params) {
        if (params.hasOwnProperty(key)) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
        }
    }

    document.body.appendChild(form);
    form.submit();
}


/*Executes script to add product to cart*/
function addToCart(id_user, id_produs) {
    var xhttp;
    var nr_produse = document.getElementById("nr_produse").value;
    var params = "ID_Utilizator=" + id_user.toString() + "&ID_Produs=" + id_produs.toString() + "&Nr_Produse=" + nr_produse.toString();
    xhttp = new XMLHttpRequest();
    xhttp.open("POST", "addToCart.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(params);
    alert("Produs(e) adaugat(e)!");
}

/*Script to delete product from cart*/
function deleteProduct(productID) {
    var xhttp;
    var params = "productID=" + productID.toString();
    xhttp = new XMLHttpRequest();

    xhttp.open("POST", "deleteProduct.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = setTimeout(function refr() {
        window.location.reload(true);
    }, 200);
    xhttp.send(params);
}