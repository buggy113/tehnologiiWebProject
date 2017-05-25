<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname="bestparts";

    //Creare conexiune
    $conn = new mysqli($servername, $username, $password, $dbname);

    //Verificare creare conexiune
    if ($conn->connect_error){
        die("Eroare la conexiune!");
    }
    if ( isset($_POST['btn-signup']) ) {
  
    // clean user inputs to prevent sql injections
    $name = trim($_POST['uname']);
    $name = strip_tags($name);
    $name = htmlspecialchars($name);
  
    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);
    
    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);

    $hint = trim($_POST['hint']);
    $hint = strip_tags($hint);
    $hint = htmlspecialchars($hint);
    
    // basic name validation
    if (empty($name)) {
    $error = true;
    $nameError = "Please enter an username";
    } else if (strlen($name) < 3) {
    $error = true;
    $nameError = "Username must have atleat 3 characters.";
    // TODO: check uname exist or not  
    } 
    
    
    //basic email validation
    if ( !filter_var($email,FILTER_VALIDATE_EMAIL)) {
    $error = true;
    $emailError = "Please enter valid email address.";
    } else {
    // TODO: check email exist or not  
    }
    

    // password validation
    if (empty($pass)){
    $error = true;
    $passError = "Please enter password.";
    } else if(strlen($pass) < 6) {
    $error = true;
    $passError = "Password must have atleast 6 characters.";
    }
    
    // password encrypt using SHA256();
    $password = hash('sha256', $pass);
    if($error != true){
        // if there's no error, continue to signup
        $query="INSERT INTO users(`Nume_Utilizator`, `Parola`, `Adresa_Email`, `Indiciu_parola`) VALUES ('$name','$password', '$email', '$hint');";
        $result = $conn->query($query);
    }
    }

?>


<html>
<head>
    <title>BestParts Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/loginStyle.css">
</head>
<body>

    <?php
    if ( isset($errMSG) ) {
    ?>
    alert("A intervenit o eroare");

    <?php
        }
    ?>


    <div id="support">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
            <div class="imgcontainer">
                <img src="img/user_login.png" alt="Avatar" class="avatar">
            </div>

            <div class="container">
                <label><b>Nume utilizator: </b><span class='error_message'><?php if ( isset($nameError) ) echo $nameError;  ?></span></label> 
                <input type="text" placeholder="Nume utilizator..." name="uname" required>

                <label><b>Parolă: </b> <span class='error_message'><?php if ( isset($passError) ) echo $passError; ?></span></label>
                <input type="password" placeholder="Parolă..." name="pass" required>

                <label><b>Indiciu: </b></label>
                <input type="text" placeholder="Indiciu..." name="hint" >


                <label><b>Adresă de E-mail: </b> <span class='error_message'><?php if ( isset($emailError) ) echo $emailError; ?></span></label>
                <input type="text" placeholder="Adresă e-mail..." name="email" required>
                <button type="submit" name="btn-signup">Înregistrare</button>
            </div>
            <div class="container">
                <a href="index.php">
                    <div class="cancelbtn">Renunta!</div>
                </a>
                <span class="psw"><a href="login.php">Autentificare</a></span>
            </div>
        </form>
    </div>
</body>
</html>