<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname="bestparts";
    $con=mysqli_connect("$servername","$username","$password","$dbname");

    $id_produs = trim($_GET["id_produs"]);
    $id_produs = strip_tags($id_produs);
    $id_produs = htmlspecialchars($id_produs);

    if (isset($_SESSION['uid']))
    {
        $id_utilizator=$_SESSION['uid'];
    }
    // TODO: Guest sessions

    $query="SELECT Denumire,Pret,ID_Produs,Detalii,Disponibil,Imagine FROM produse WHERE '$id_produs'=ID_Produs";
    $result=mysqli_query($con,$query);
    if($result != FALSE && $row=mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
        $imag = $row["Imagine"];
        $denum = $row["Denumire"];
        $pret = $row["Pret"];
        $detalii = $row["Detalii"];
        $disponibi = $row["Disponibil"];
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>BestParts Product Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/indexStyle.css">
    <link rel="stylesheet" href="css/procesoareStyle.css">

    <script src="js/utils.js"></script>
</head>


    <body id="product_body" onresize="bannerChange()">
        <?php include 'header.php'; ?>

        

        <div id="PageContent">
            <table class="ProductContent">
                <tr>
                    <td class="product-image">
                        <img src=<?php echo "$imag";?>  title="">
                        <figcaption></figcaption>

                    </td>
                    <td class="product-description">
                        <h1><?php echo "$denum";?></h1>
                        <br><br>
                        <fieldset>
                            <p class="stock"><?php if($disponibi > 0) echo "*produsul este in stoc! ($disponibi produs(e) disponibil(e)";?> </p> <p style="color: red;"> <?php if($disponibi <= 0){ echo "*produsul nu mai este in stoc!"; $nostock=true;}?> </p>
                            <br><br>
                            <p class="description-text">Preț:</p>

                            <p class="description-text"><b><?php echo $pret . " RON";?></b></p>
                            <br><br><br>
                                <?php
                                if(!isset($nostock)){
                                echo "<p class='buy_number buy_txt'>Cantitate:</b>";
                                echo "<input type='number' id='nr_produse'  class='buy_number' name='quantity' min='0' max='$disponibi'>"; 
                                }?>
                                <br><br><br>
                                <?php
                                if(isset($id_utilizator))
                                    {if(!isset($nostock)) echo "<a href='#' onclick=addToCart($id_utilizator,$id_produs);><input type='submit' class='buy_button' value='Adaugă în coș!'></a>";}
                                else
                                    {if(!isset($nostock)) echo "<a href='login.php'><input type='submit' class='buy_button' value='Adaugă în coș!'></a>";}
                                ?>
                            </form>
                        </fieldset>
                    </td>
                </tr>
            </table>
            <br>
            <br>
            <div class="specs">
                <h1>Specificatii:</h1>
                <table>
                <?php 
                    $token = strtok($detalii, ";");
                    while ($token != false)
                    {
                        $el_array = explode(':',$token);
                    ?>
                    <tr>
                        <th><?php echo $el_array[0];?></th>
                        <td><?php echo $el_array[1];?></td>
                    </tr>
                    <?php
                    $token = strtok(";");
                    }
                    ?>
                </table>
            </div>
        </div>
        <?php include('footer.php') ?>

    </body>

</html>