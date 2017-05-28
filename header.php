 <?php
 if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname="bestparts";

    if( isset($_SESSION['uname']) ) {
        // select loggedin users detail
        $uname = $_SESSION['uname'];
        $uid = $_SESSION['uid'];
        $con_header = mysqli_connect("$servername","$username","$password","$dbname");

        $query_header="SELECT ID_Utilizator, Nume_Utilizator, Credit,Tip_Utilizator FROM users WHERE Nume_Utilizator='$uname'";


        $result_header=mysqli_query($con_header,$query_header);
        $row_header=mysqli_fetch_array($result_header, MYSQLI_ASSOC);

         $Tip_Utilizator=$row_header["Tip_Utilizator"];

        $query_cart="SELECT COUNT(ID)  FROM cart_entry WHERE ID_Utilizator=$uid";
        $result_cart=mysqli_query($con_header,$query_cart);
        $row_cart=mysqli_fetch_array($result_cart, MYSQLI_NUM);
        $product_number = $row_cart[0];

  
        $query_cost="SELECT SUM(produse.Pret*cart_entry.Nr_Produse) as Total " .
                    "FROM cart_entry " .
                    "INNER JOIN produse " .
                    "ON cart_entry.ID_Produs=produse.ID_Produs " .
                    "GROUP BY cart_entry.ID_Utilizator " .
                    "HAVING cart_entry.ID_Utilizator=$uid";
        $result_cost=mysqli_query($con_header,$query_cost);
        $row_cost=mysqli_fetch_array($result_cost, MYSQLI_NUM);


    
    }
?>
 <header id="banner">
    <div class="logo">
        <img class="logoimg" src="img/pc_icon.png" class="banner-icon">
    </div>
     <div id="top-right">
        <div class="loginButton">
            <a href="editProfile.php">
                <img src="img/user.png" width="30px" height="30px"> Contul meu
            </a>
            <div class="pp" style="height: 300px;">
                <img src="img/user.png">

                <?php
                    if (!isset($_SESSION['uname'])){ ?>
                        <p>Nu sunteți logat.</p>
                        <br>
                        <div class="dropbtn" style="width: 140px; display: inline-block;">
                            <a href="login.php">Conectează-te</a>
                        </div>
                        <div class="dropbtn" style="width: 140px; display: inline-block;">
                            <a href="register.php">Înregistrează-te</a>
                        </div>
                <?php } 

                else { 
                     echo "<br><br> Bine ai venit $uname! <br><br>";
                     if($Tip_Utilizator=="admin"){
                ?>
                    <a href="admin.php">Administrare useri</a>
                       <br><br>
                    <a href="admin.php">Istoric plati</a>
                    <br>
                    <br>
                         <?php } ?>
                         <div class="dropbtn" style="width: 140px; display: inline-block;">
                            <a href="logout.php?logout">Log Out</a>  
                   </div>
                <?php }
                 ?>
                
            </div>
        </div>

        <div class="loginButton">
            <a href="cos.php">
                <img src="img/cart.png"> Cosul meu
            </a>
            <div class="pp" style="right: 0;">
                <?php
                     echo"  <img src='img/cart.png'>";
                     if (isset($product_number)){
                        if ($product_number == 0)
                        {
                            echo"  <p>Momenten Cosul este gol.</p>";
                        } 
                        else
                        {
                            $cost_total = $row_cost[0];
                            echo"  <p>Aveti $product_number produse in cosul dumneavoastra.<br>Valoare: <b>$cost_total</b> RON";
                            $credit = $row_header["Credit"];
                            echo "<br>Credit disponibil: $credit";
                        }  
                        echo"  <p class='cos-cost'></p>";
                        echo"  <div class='dropbtn' style='width: 140px; display: inline-block;'>";
                        echo"      <a href='cos.php'>Vezi detalii</a>";
                        echo"  </div>";
                     }
                     else
                     {
                         //echo"<br><br><br><br>";
                         echo"  <p class='cos-cost'>Nu sunteti logat.</p>";
                     }
                     
                ?>
            </div>
        </div>
    </div>
    
</header>
<div class="topnav">
        <a href="index.php">Acasă</a>
        <a href="asamblare.php">Asamblare</a>
        <a href="info.php">Informații</a>
        <a href="contact.php">Contact</a>
</div>