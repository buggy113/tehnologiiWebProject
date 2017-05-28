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
        $query= "SELECT cart_entry.ID, Denumire, cart_entry.Nr_Produse, Pret ".
                "FROM cart_entry " .
                "INNER JOIN produse " .
                "ON produse.ID_Produs=cart_entry.ID_Produs " .
                "WHERE cart_entry.ID_Utilizator=$uid";
                
        $result = $con->query($query);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>BestParts Basket Page</title>
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
        <h1>Produse adăugate în coș: </h1>

        <br>
        <table>
            <tr>
                <th>Produs:</th>
                <th>Nr. bucăți:</th>
                <th>Preț:</th>
            </tr>
            <?php
            $total = 0;
             while($result != FALSE && $row=mysqli_fetch_array($result, MYSQLI_ASSOC))
            {
                $productID = $row["ID"];
                $denumire=$row["Denumire"];
                $nr_produse=$row["Nr_Produse"];
                $pret=$row["Pret"];
                $pret_total = $pret * $nr_produse;
                $total = $total + $pret_total;
                echo"   <tr>";
                echo"       <th>$denumire";
                echo"       <td>$nr_produse</td>";
                echo"       <td>$pret_total</td>";
                echo"       <td><a href='#' onclick='deleteProduct($productID)' style='text-decoration: none;color: red; font-weight: 700'>X</a></td>";;
                echo"   </tr>";
            }
            ?>
            <tr>
                <td></td>
                <th style="text-align: right;font-size: 30px;">Total:</th>
                <td><?php echo $total;?> Lei</td>
            </tr>
        </table>
        <form method="POST" action='buy.php'>
            <button type="submit">Cumpără! (<?php echo $total;?> Lei)</button>
            <input type="hidden" value='<?php echo "$total"?>' name="pret" />
        </form>
        <center><font color="red" style="font-size: 250%;"><a href="deleteAllProducts.php">Goleste cosul!</font></center>
    </div>
    <?php include('footer.php') ?>
</body>

</html>