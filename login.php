<?php
    session_start();
    if(isset($_POST['btn-login'])) { 
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname="bestparts";

        $error = false;
        //Creare conexiune
        $con=mysqli_connect("$servername","$username","$password","$dbname");

        //Verificare creare conexiune
       


        // prevent sql injections/ clear user invalid inputs
        $uname = trim($_POST['uname']);
        $uname = strip_tags($uname);
        $uname = htmlspecialchars($uname);
        
        $pass = trim($_POST['pass']);
        $pass = strip_tags($pass);
        $pass = htmlspecialchars($pass);
        // prevent sql injections / clear user invalid inputs
        
        if(empty($uname)){
            $error = true;
            $uanmeError = "Please enter your username";
        } 
        
        if(empty($pass)){
            $error = true;
            $passError = "Please enter your password.";
        }
        
        // if there's no error, continue to login
        if (!$error) {
            $password = hash('sha256', $pass); // password hashing using SHA256
            
            $query="SELECT ID_Utilizator,Nume_Utilizator, Parola FROM users WHERE Nume_Utilizator='$uname' AND Parola='$password'" ;

            $result=mysqli_query($con,$query);
            $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
            $rowcount=mysqli_num_rows($result);
    

            if( $rowcount == 1) {
                $_SESSION['uname'] = $row['Nume_Utilizator'];
                header("Location: index.php");
                exit;
            } else {
                $errMSG = "Incorrect Credentials, Try again...";
            }
            
        }
        
 }


?>


<html>
<head>
    <title>BestParts Login Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/loginStyle.css">
</head>
<body>
    <?php if(isset($errMSG)) { echo "<script type='text/javascript'>alert('Date de login Gresite');</script>";} ?>
    

    <div id="support">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
            <div class="imgcontainer">
                <img src="img/user_login.png" alt="Avatar" class="avatar">
            </div>

            <div class="container">
                <label><b>Nume utilizator:</b></label>
                <input type="text" placeholder="Nume utilizator..." name="uname" required>

                <label><b>Parolă:</b></label>
                <input type="password" placeholder="Parolă..." name="pass" required>
                <button type="submit" name="btn-login">Autentificare</button>
                <input type="checkbox" checked="checked"> Remember me
            </div>
            <div class="container">
                <a href="index.php">
                    <div class="cancelbtn">Renunta!</div>
                </a>
                <span class="psw">Ai <a href="reset.php">uitat parola?</a> </span>
                <span>Nu ai un cont? <a href="register.php">Înregistrează-te!</a> </span>
            </div>
        </form>
    </div>
</body>
</html>