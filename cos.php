<!DOCTYPE html>
<html lang="en">

<head>
    <title>BestParts Basket Page</title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/indexStyle.css">
    <link rel="stylesheet" href="css/cosStyle.css">

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

    <div class="prod">
        <h1>Produse adăugate în coș(2750 lei): </h1>

        <br>
        <table>
            <tr>
                <th>Produs:</th>
                <th>Nr. bucăți:</th>
                <th>Preț:</th>

            </tr>
            <tr>
                <th>Super HDD 100TB</th>
                <td>1</td>
                <td>500 Lei</td>
                <th><a href="$">X</a></th>
            </tr>
            <tr>
                <th>Intel core i7 3.4GHz</th>
                <td>1</td>
                <td>1150 Lei</td>
                <th><a href="$">X</a></th>
            </tr>
            <tr>
                <th>Sursa alimentare 1000W</th>
                <td>1</td>
                <td>1000 Lei</td>
                <th><a href="$">X</a></th>
            </tr>
            <tr>
                <td></td>
                <th style="text-align: right;font-size: 30px;">Total:</th>
                <td>2750 Lei</td>
            </tr>
        </table>
        <button type="submit">Cumpără! (2750 Lei)</button>

    </div>



    <?php include('footer.php') ?>

</body>

</html>