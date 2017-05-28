<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname="bestparts";

    $con=mysqli_connect("$servername","$username","$password","$dbname");

    $uid = $_SESSION["uid"];
    $pret = $_POST["pret"];

    $query="SELECT Credit FROM users WHERE ID_Utilizator=$uid";
    $result=mysqli_query($con,$query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $credit=$row["Credit"];

    if($pret < $credit)
    {
        $query_select= "SELECT cart_entry.ID, produse.ID_Produs as ID, Disponibil, cart_entry.Nr_Produse as Nr_Produse, Pret ".
                "FROM cart_entry " .
                "INNER JOIN produse " .
                "ON produse.ID_Produs=cart_entry.ID_Produs " .
                "WHERE cart_entry.ID_Utilizator=$uid";
        $result_select=mysqli_query($con,$query_select);

        while($result_select != FALSE && $row=mysqli_fetch_array($result_select, MYSQLI_ASSOC))
        {
            if($row["Disponibil"] - $$row["Nr_Produse"] < 0 )
            {
                echo "<script>alert(Unul din produse nu mai este in  stoc!)</script>;";
                header("Location: cos.php");
            }
            $productID = $row["ID"];
            $nr_produse=$row["Nr_Produse"];
            $query_product="UPDATE `bestparts`.`produse` SET Disponibil=Disponibil-$nr_produse WHERE `ID_Produs`=$productID;";
            mysqli_query($con,$query_product);
        }
        $date = date("Y-m-d");
        $query_istoric = "INSERT INTO `bestparts`.`istoric` (`ID_User`, `Pret_total`, `Data`) VALUES ('$uid', '$pret', '$date')";
        mysqli_query($con,$query_istoric);
        
        $query_remove="DELETE FROM cart_entry WHERE ID_Utilizator=$uid";
        mysqli_query($con,$query_remove);

        $query_credit = "UPDATE `bestparts`.`users` SET Credit=$credit-$pret WHERE `ID_Utilizator`='$uid'";
        mysqli_query($con,$query_credit);
        header("Location: index.php");
    }
    else
    {
        echo "<script>alert('Credit insuficient');</script>";
    }
?>