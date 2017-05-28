

<!DOCTYPE html>
<html lang="en">

<head>
    <title>BestParts Admin Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/indexStyle.css">
    <link rel="stylesheet" href="css/adminStyle.css">
    <script src="js/index.js"></script>
    <script src="js/jquery-3.2.0.min.js"></script>
    <script src="js/usersedit.js"></script>
    <script src="js/utils.js"></script>
</head>
    

<body onload="showUsers();"  onresize="bannerChange()">
    <?php include 'header.php'; ?>

    

    <div class="content">
        <h1>Editare useri:</h1>
        <div id="userTable"></div>
        
    </div>
    
    <?php include('footer.php') ?>

</body>

</html>