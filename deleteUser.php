<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname="bestparts";
    $con=mysqli_connect("$servername","$username","$password","$dbname");

    $id_user = $_POST["id_user"];
    $query="DELETE FROM users WHERE ID_Utilizator=$id_user";
    $result=mysqli_query($con,$query);
?>