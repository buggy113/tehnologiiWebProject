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
        $con_header = mysqli_connect("$servername","$username","$password","$dbname");

        $query_header="SELECT ID_Utilizator, Nume_Utilizator FROM users WHERE Nume_Utilizator='$uname'";
        $result_header=mysqli_query($con_header,$query_header);
        $row_header=mysqli_fetch_array($result_header, MYSQLI_ASSOC);
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
                     echo "<br> Bine ai venit " . $uname;
                ?>
                   <div class="dropbtn" style="width: 140px; display: inline-block;">
                            <a href="logout.php?logout">Log Out</a>
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="loginButton">
            <a href="cos.php">
                <img src="img/cart.png"> Cosul meu
            </a>
            <div class="pp" style="right: 0;">
                <img src="img/cart.png">
                <p>Momenten Cosul este gol.</p>
                <p class="cos-cost">0 Lei (0 produse)</p>
                <div class="dropbtn" style="width: 140px; display: inline-block;">
                    <a href="cos.php">Vezi detalii</a>
                </div>
            </div>
        </div>
    </div>
</header>
