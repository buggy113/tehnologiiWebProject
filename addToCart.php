<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname="bestparts";
    $error = false;
    //Creare conexiune

    // TODO: Check if product in stock
    //       Check if already exist and increment;
    $ID_Produs = $_POST["ID_Produs"];
    $ID_User = $_POST["ID_Utilizator"];
    $Nr_Produse = $_POST["Nr_Produse"];

    $conn = new mysqli($servername, $username, $password, $dbname);
    //We have a triigger on insert to add if object already in cart

    $query_alreadyIn = "SELECT COUNT(ID) FROM cart_entry WHERE ID_Produs=$ID_Produs AND  ID_Utilizator=$ID_User";
    $result = $conn->query($query_alreadyIn);
    $response=mysqli_fetch_array($result, MYSQLI_NUM);


    if($response[0] == 0){
        $query="INSERT INTO cart_entry(`ID_Utilizator`, `ID_Produs`,`Nr_Produse` ) VALUES ($ID_User,$ID_Produs,$Nr_Produse)";
    }
    else
    {
         $query="UPDATE cart_entry SET Nr_Produse=Nr_Produse+$Nr_Produse WHERE ID_Produs=$ID_Produs and ID_Utilizator=$ID_User";
    }
    echo "dddddddddd";
    $result = $conn->query($query);
?> 