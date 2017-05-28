<?php
 
    if(!isset($_GET["id_categorie"]))
    {
        $id_categorie='$id_cat';
    }
    else
    {
        $id_categorie = trim($_GET["id_categorie"]);
        $id_categorie = strip_tags($id_categorie);
        $id_categorie = htmlspecialchars($id_categorie);
    }
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname="bestparts";


    // select loggedin users detail

    $con=mysqli_connect("$servername","$username","$password","$dbname");
    if($id_categorie=='$id_cat')
    {
        $query="SELECT ID_Produs, Denumire, Pret, Imagine, Categorie FROM produse";
    }
    else
    {
        $query="SELECT ID_Produs, Denumire, Pret, Imagine, Categorie FROM produse WHERE '$id_categorie'=Categorie";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>BestParts Listing Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/indexStyle.css">
    <link rel="stylesheet" href="css/listare.css">

    <script src="js/index.js"></script>
    <script src="js/jquery-3.2.0.min.js"></script>
</head>

<body onresize="bannerChange()">

    <?php include 'header.php'; ?>

    
    <div class="header2">
        <h1>Rezultate cautare:</h1>
        <h2>Cauta: <input type="search" id="search" placeholder="Search..." /><button type="submit">Aplică</button></h2>
        
        <h2>Sortare după:
            <select name="sorttype">
                <option value="nume">Nume</option>
                <option value="pretc">Pret Crescător</option>
                <option value="pretd">Pret Descrescător</option>
            </select>
            <button type="submit">Aplică</button>
        </h2>
        <h2>Filtrare după:
            <select name="filtertype">
                <option value="pretmic">Pret mai mic</option>
                <option value="pretmare">Pret mai mare</option>
            </select> decât
            <input type="text" name="pret"> RON.
            <button type="submit">Aplică</button>
        </h2>

    </div>

    <br><br>

    <div class="content">

        
        <?php
            
            $result=mysqli_query($con,$query);
            
            while($result != FALSE && $row=mysqli_fetch_array($result, MYSQLI_ASSOC))
            {
                $imag = $row["Imagine"];
                $denum = $row["Denumire"];
                $pret = $row["Pret"];
            echo"<div class='prd'>"; 
            echo"<div class='pr-image'>";
            echo"   <a href='produsTemplate.php'>";
            echo"       <img src='$imag' alt=''>";
            echo"   </a>";
            echo"</div>";

            echo"<div class='pr-info'>";
            echo"   <div class='pr-text'>";
            echo"       $denum";
            echo"   </div>";
            echo"   <div class='pr-pret'>";
            echo"       $pret Lei";
            echo"   </div>";
            echo"   <div class='sub-butt'>";
            echo"       <form action='produsTemplate.php' method='get'>";
            echo"           <button type='submit'>Vizualizare produs</button>";
            echo"       </form>";
            echo"       <form action='#' method='get'>";
            echo"           <button type='submit' style='background-color: #993232'>Adaugă în coș </button>";
            echo"       </form>";
            echo"   </div>";
            echo" </div>";
            echo" </div>";
            }
           
            ?>
       
    </div>


    <?php include('footer.php') ?>

</body>

</html>