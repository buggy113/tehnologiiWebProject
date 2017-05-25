<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname="bestparts";


    // select loggedin users detail

    $con=mysqli_connect("$servername","$username","$password","$dbname");

    
    
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>BestParts Home Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/indexStyle.css">
    <script src="js/index.js"></script>
    <script src="js/jquery-3.2.0.min.js"></script>
</head>

<body onscroll="menu_scroll()" onresize="bannerChange()">
    
   <?php include 'header.php'; ?>

    <div class="topnav">
        <a href="index.php">Acasă</a>
        <a href="asamblare.php">Asamblare</a>
        <a href="info.php">Informații</a>
        <a href="contact.php">Contact</a>

        <div class="search-bar-box">
            <div class="search-bar">
                <input type="search" id="search" placeholder="Search..." />
            </div>
        </div>

    </div>




    <div id="advertisment">
        <div id="advantages">
            <div id="all-advantages">
                <div class="advantages-item">
                    <img src="img/diversity.png" class="icon">
                    <p>
                        Produse diverse
                    </p>

                </div>
                <div class="advantages-item">
                    <img src="img/new.png" class="icon">
                    <p>
                        Stocuri noi
                    </p>

                </div>
                <div class="advantages-item">
                    <img src="img/cheap.png" class="icon">
                    <p>
                        Prețuri avantajoase
                    </p>

                </div>
                <div class="advantages-item">
                    <img src="img/support.png" class="icon">
                    <p>
                        Support 24/7
                    </p>

                </div>
                <div class="advantages-item">
                    <img src="img/return.png" class="icon">
                    <p>
                        Returnare în 30 zile
                    </p>

                </div>
            </div>
        </div>


    
    </div>
    <div class="content">
        <div class="column-wrapper">
            <div class="column-side-bar">
                <div class="side-bar-elements">
<?php
        $query="SELECT ID_Categorie, Categorie FROM categorii_produse";
        $result=mysqli_query($con,$query);
        while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $nume_cat = $row["Categorie"];
            echo"   <a href='listareTemplate.php?categorie=$nume_cat'>";
            echo"       <div class='whole-button'>";
            echo"           <button class='dropbtn'>$nume_cat</button>";
            echo"       </div>";
            echo"   </a>";
        }
?>

                </div>
            </div>
    <?php 
        $query="SELECT ID_Produs, Denumire, Pret, Imagine FROM produse";
        $result=mysqli_query($con,$query);
        echo"<div class='column-products'>";
        while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            $imag = $row["Imagine"];
            $denum = $row["Denumire"];
            $pret = $row["Pret"];
        
        echo"   <div class='product'>";
        echo"       <a href='produsTemplate.php'>";
        echo"           <img src='$imag'>";
        echo"           <div class='text-product'>";
        echo"               $denum";
        echo"           </div>";
        echo"           <div class='price-product'>";
        echo"               $pret RON";
        echo"           </div>";
        echo"       </a>";
        echo"   </div>";
        
        }
        echo"</div>";
        ?>
        </div>
    </div>
    
    <?php include('footer.php') ?>

</body>

</html>