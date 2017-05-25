<?php 
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
}
    $rand_pass=generateRandomString(10);
    $mailbody = "Buna ziua!\n\n Acest mail a fost generat ca urmare a cererii dvs. de resetare a parolei.\n Noua parola este $rand_pass\n\n O zi buna!\n BestParts.ro";
    mail("$_POST['email']", "BestParts - reset password", $mailbody,"From: cos.avram@gmail.com");
    header("Location: index.php");
?>