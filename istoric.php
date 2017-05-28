<?php
        session_start();
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname="bestparts";

        $error = false;
        //Creare conexiune
        $con=mysqli_connect("$servername","$username","$password","$dbname");
        $uid = $_SESSION["uid"];
        $query= "SELECT users.Nume_Utilizator, Pret_total, `Data`
                 FROM istoric
                 INNER JOIN users
                    ON istoric.ID_User=ID_Utilizator";
                
        $result = $con->query($query);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>BestParts History Page</title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/indexStyle.css">
    <link rel="stylesheet" href="css/cosStyle.css">

    <script src="js/jquery-3.2.0.min.js"></script>
    <script src="js/utils.js"></script>
</head>

<body onresize="bannerChange()">
    <?php include 'header.php'; ?>
    
    

    <div class="prod">
        <h1>Istoric comenzi: </h1>

        <br>
        <table>
            <tr>
                <th>Nume Utilizator:</th>
                <th>Pret Comanda:</th>
                <th>Data:</th>
            </tr>
            <?php
            $total = 0;
             while($result != FALSE && $row=mysqli_fetch_array($result, MYSQLI_ASSOC))
            {
                $Nume_Utilizator = $row["Nume_Utilizator"];
                $Pret_total=$row["Pret_total"];
                $Data=$row["Data"];

                echo"   <tr>";
                echo"       <th>$Nume_Utilizator";
                echo"       <td>$Pret_total</td>";
                echo"       <td>$Data</td>";
                echo"   </tr>";
            }
            ?>

        </table>
    </div>
    <?php include('footer.php') ?>
</body>

</html>