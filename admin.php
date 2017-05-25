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
</head>
    

<body onresize="bannerChange()">
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

    <div class="content">
        <h1>Editare useri:</h1>

        <table class="usersTable">
            <tr>
                <th>Username</th>
                <th>E-mail</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <tr>
                <td>bossu_nr1</td>
                <td>boss.99@kk.com</td>
                <td><a href="editProfile.php">Edit</td>
                <td><a href="#" style="text-decoration: none;color: red; font-weight: 700">X</a></td>
            </tr>
            <tr>
                <td>bossu_nr1</td>
                <td>boss.99@kk.com</td>
                <td><a href="editProfile.php">Edit</td>
                <td><a href="#" style="text-decoration: none;color: red; font-weight: 700">X</a></td>
            </tr>
            <tr>
                <td>bossu_nr1</td>
                <td>boss.99@kk.com</td>
                <td><a href="editProfile.php">Edit</td>
                <td><a href="#" style="text-decoration: none;color: red; font-weight: 700">X</a></td>
            </tr>
        </table>
    </div>
    
    <?php include('footer.php') ?>

</body>

</html>