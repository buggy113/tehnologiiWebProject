<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname="bestparts";
    $con=mysqli_connect("$servername","$username","$password","$dbname");

    $query="SELECT ID_Utilizator, Nume_Utilizator,Adresa_Email FROM users";
    $result=mysqli_query($con,$query);

    
    
?>

    <table class="usersTable">
            <tr>
                <th>Username</th>
                <th>E-mail</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>

<?php
            while($result != FALSE && $row=mysqli_fetch_array($result, MYSQLI_ASSOC))
            {
                $Nume_Utilizator=$row["Nume_Utilizator"];
                $Adresa_Email=$row["Adresa_Email"];
                $ID_Utilizator=$row["ID_Utilizator"];
            echo "       <tr>";
            echo "       <td>$Nume_Utilizator</td>";
            echo "       <td>$Adresa_Email</td>";
            $editProfileString = "post(\"editProfile.php\",{alt_user:\"$Nume_Utilizator\"})";
            
            echo "       <td><a href='#' onclick='$editProfileString');'>Edit</a></td>";
            echo "       <td><a href='#' onclick='deleteUser($ID_Utilizator)' style='text-decoration: none;color: red; font-weight: 700'>X</a></td>";
            echo "       </tr>";
            }
?>
        </table>
