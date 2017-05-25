<!DOCTYPE html>
<html lang="en">

<head>
    <title>BestParts Contact Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/indexStyle.css">
    <link rel="stylesheet" href="css/contactStyle.css">
    <script src="js/contact.js"></script>
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

    <div class="PageContainer ">
        <div class="element left-element ">
            <h3>Suport 24/7</h3>
            <ul>
                <li>Telefon fix: 021 987.63.42</li>
                <li>Telefon mobil: 0756.321.222</li>
                <li>Program: L-D: 24/24</li>
            </ul>
            <hr>
            <h3>Contact Service</h3>
            <ul>
                <li>Telefon fix: 021.2363.33.55</li>
                <li>Telefon mobil: 0754.545.454</li>
                <li>Program: L-V: 09:00-20:00</li>
            </ul>

            <h3>Puncte de livrare</h3>
            <ol>
                <li>Strada Crizantemelor, nr.26, Sector 3, Bucuresti</li>
                <li>Strada Mihai Viteazul, nr. 199, Sector 1, Bucuresti</li>
                <li>Strada Mercenarilor, nr 444, Sector 4, Bucuresti</li>
            </ol>
            <h3>Showroom</h3>
            <ul>
                <li> Strada Crizantemelor, Nr.9</li>
            </ul>
        </div>
        <div class="element right-element ">
            <h1>Contact</h1>
            <h3>Inregistrare comenzi, anulare si modificari comenzi</h3>
            <p>T*: 021 200.52.00 M*: 0722.25.00.00 <br> Luni – Duminica: 24/24<br> <small> *linii telefonice cu tarif normal</small>
            </p>
            <h3>Locație Showroom</h3>
            <div id="map">
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLc8O41qcjDx3Wpdsgd718nrHnQjeYzgI&callback=myMap "></script>
            </div>

            <h3>Ridicare comenzi:</h3>
            <p>Comenzile se pot ridica din Showroom zilnic, de Luni până Sâmbătă direct din showroom între orele 08:00 și 20:00.</p>


        </div>
    </div>

    <?php include('footer.php') ?>
</body>

</html>