<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname="bestparts";

    if(isset($_SESSION['uname']) ) {
        // select loggedin users detail
        $uname = $_SESSION['uname'];
        $con=mysqli_connect("$servername","$username","$password","$dbname");

        $query="SELECT ID_Utilizator, Nume_Utilizator, Nume, Adresa_Email, Prenume, Data_Nasterii, Sex, Adresa, Localitate, Judet, Numar_Telefon, Tip_Plata FROM users WHERE Nume_Utilizator='$uname'";
        $result=mysqli_query($con,$query);
        $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
        
        $ID_Utilizator = $row["ID_Utilizator"];
        $Nume_Utilizator=$row["Nume_Utilizator"];
        $Nume = $row["Nume"];
        $Adresa_Email = $row["Adresa_Email"];
        $Prenume = $row["Prenume"];
        $Data_Nasterii =$row["Data_Nasterii"];
        $Sex = $row["Sex"];
        $Adresa = $row["Adresa"];
        $Localitate = $row["Localitate"];
        $Judet = $row["Judet"];
        $Numar_Telefon=$row["Numar_Telefon"];
        $Tip_Plata=$row["Tip_Plata"];

    }
    else
        die("Not Logged in!");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>BestParts EditProfile Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/indexStyle.css">
    <link rel="stylesheet" href="css/editProfileStyle.css">
</head>

<body>
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
    <div class="profileContent">

        <form action="editDatePersonale.php" method="post">
            <fieldset class="infoBlock">
                <h2>Date personale:</h2>
                <div id="gender">
                    <input type="radio" name="gender" <?php if (isset($row)) if( $row['Sex'] == 'b') { echo 'checked';}?>>Domnul:
                    <input type="radio" name="gender"<?php if (isset($row)){ if($row['Sex'] == 'f') { echo 'checked';}}?>>Doamna:
                </div>
                <br>
                <div class="inputElement">
                    <div class="textElement"> Username:</div>
                    <div class="userType"><input type="text" name="username" disabled value=<?php echo "$Nume_Utilizator";?>></div>
                </div>

                <div class="inputElement">
                    <div class="textElement"> Nume:</div>
                    <div class="userType"><input type="text" name="lastname" value=<?php if(isset($Nume)) echo "$Nume"; else echo "Nume..."?> ></div>
                </div>
                <div class="inputElement">
                    <div class="textElement"> Prenume:</div>
                    <div class="userType"><input type="text" name="firstname" value=<?php if(isset($Prenume)) echo "$Prenume"; else echo "Prenume..."?>></div>
                </div>
                <div class="inputElement">
                    <div class="textElement"> E-mail:</div>
                    <div class="userType"><input type="email" name="email" value=<?php echo "$Adresa_Email";?>></div>
                </div>
                <div class="inputElement">
                    <div class="textElement"> Data Nașterii:</div>
                    <div class="userType"><input type="date" name="birth" <?php if(isset($Data_Nasterii)) echo "value='$Data_Nasterii'";?></div>
                </div>
                <div class="inputElement">
                    <div class="textElement"> Nr. Telefon:</div>
                    <div class="userType"><input type="text" name="phone" <?php if(isset($Numar_Telefon)) echo "value=$Numar_Telefon";?>></div>
                </div>
                <br>
                <input type="submit" name="ok_date_pers" value="Editează" class="editButton">
            </fieldset>

            <br>
            <br>

            <fieldset class="infoBlock">
                <h2>Date de livrare:</h2>
                <h4> Preferință de plată:</h4>

                <div id="plata">
                    <input type="radio" name="plata" value="ra"<?php if(isset($Tip_Plata) && $Tip_Plata == "ra") echo "checked";  ?>>Ramburs
                    <input type="radio" name="plata" value="cu"<?php if(isset($Tip_Plata) && $Tip_Plata == "cu") echo "checked";  ?>>Cu cardul
                    <input type="radio" name="plata" value="cr"<?php if(isset($Tip_Plata) && $Tip_Plata == "cr") echo "checked";  ?>>Credit
                </div>
                <br>
                <div class="inputElement">
                    <div class="textElement">Adresă:</div>
                    <div class="userType"><input type="text" name="adress" <?php if(isset($Adresa)) echo "value='$Adresa'";?>></div>
                </div>

                <div class="inputElement">
                    <div class="textElement"> Localitate:</div>
                    <div class="userType"><input type="text" name="city" <?php if(isset($Localitate)) echo "value='$Localitate'";?>></div>
                </div>
                <div class="inputElement">
                    <div class="textElement"> Județ:</div>
                    <div class="userType"><input type="text" name="county" <?php if(isset($Judet)) echo "value='$Judet'";?>></div>
                </div>
                <br>
                <input type="submit" name="ok_date_livrare" value="Editează" class="editButton">
            </fieldset>

        </form>
    </div>

    <?php include('footer.php') ?>
</body>

</html>