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
        $query="SELECT ID_Produs, Denumire, Pret, Imagine, Categorie FROM produse WHERE 1=1 ";
    }
    else
    {
        $query="SELECT ID_Produs, Denumire, Pret, Imagine, Categorie FROM produse WHERE '$id_categorie'=Categorie ";
    }

    if(isset($_POST["searching_btn"]) && !empty($_POST["search_by"]))
    {
        $alta = $_POST["search_by"];
        $query = $query . " AND Denumire like '%$alta%' ";
    }

   


    if(isset($_POST["submit_filter"]))
    {
        $pret_form=$_POST["pret"];
        switch($_POST['filtertype']){
        case 'pretmic':
            $query = $query . " AND Pret<$pret_form ";
        break;
        case 'pretmare':
            $query = $query . " AND Pret>$pret_form ";
        break;
    }
    }

    if(isset($_POST["sort_btn"]))
    {
        switch($_POST['sorttype']){
        case 'nume':
            $query = $query . " ORDER BY Denumire ";
        break;
        case 'pretc':
            $query = $query . " ORDER BY Pret ";
        break;
        case 'pretd':
            $query = $query . " ORDER BY Pret DESC";
        break;
    }
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
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  method="post">
            <h2>Cauta: <input type="search"  name='search_by' placeholder="Search..." />
            <button type="submit" name='searching_btn'>Aplică</button></h2>
        </form>
        <br>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  method="post">
        
        <h2>Sortare după:
            <select name="sorttype">
                <option value="nume">Nume</option>
                <option value="pretc">Pret Crescător</option>
                <option value="pretd">Pret Descrescător</option>
            </select>
            <button type="submit" name='sort_btn'>Aplică</button>
        </h2>
        </form>
        <br>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  method="post">
        <h2>Filtrare după:
            <select name="filtertype">
                <option value="pretmic">Pret mai mic</option>
                <option value="pretmare">Pret mai mare</option>
            </select> decât
            <input type="text" name="pret"> RON.
            <button type="submit" name='submit_filter'>Aplică</button>
        </h2>
        </form>

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