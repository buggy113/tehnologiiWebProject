<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname="bestparts";
    $uid = $_SESSION["uid"];
    $con=mysqli_connect("$servername","$username","$password","$dbname");

    $productID = $_POST["productID"];
    $query="DELETE FROM cart_entry WHERE ID='$productID' AND ID_Utilizator=$uid" ;
    $result=mysqli_query($con,$query);
    header("Location: cos.php");
?>