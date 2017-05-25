<!DOCTYPE html>
<html lang="en">

<head>
    <title>BestParts Assembly Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/indexStyle.css">
    <link rel="stylesheet" href="css/infoStyle.css">
    <link rel="stylesheet" href="css/asamblare.css">
    <script src="js/index.js"></script>
    <script src="js/asamblare.js"></script>

    <script src="js/jquery-3.2.0.min.js"></script>
</head>

<body onload="videoResize()" onresize="bannerChange(),videoResize()">
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
        <!-- Ca ala din info.php ... acelasi stil -->
        <div class="video-and-image">
            <img class="slide-image" src="img/assamb/1.jpg" style="height: 500px">
            <div class="emb-video">
                <iframe width="600px" height="350px" src="https://www.youtube.com/embed/CuSMDY8jDaA">
        
        </iframe>

            </div>
        </div>
    </div>

    <?php include('footer.php') ?>

</body>

</html>