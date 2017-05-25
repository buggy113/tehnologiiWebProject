
<!DOCTYPE html>
<html lang="en">

<head>
    <title>BestParts Product Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/indexStyle.css">
    <link rel="stylesheet" href="css/procesoareStyle.css">
</head>

<body>

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

        <div id="PageContent">
            <table class="ProductContent">
                <tr>
                    <td class="product-image">
                        <img src="img/produse/2tb-sata-iii-intellipower-64mb-red-634d503f2c67cbfac87a89dfac9c765c.jpg" title="">
                        <figcaption></figcaption>

                    </td>
                    <td class="product-description">
                        <h1>HDD Toshiba DT01ACA 500GB, 7200rpm, 32MB cache, SATA III</h1>
                        <br><br>
                        <fieldset>
                            <p class="stock">*produsul este in stock</p>
                            <br><br>
                            <p class="description-text">Preț:</p>

                            <p class="description-text"><b>400 RON</b></p>
                            <br><br><br>
                            <input type="submit" class="buy_button" value="Adaugă în coș!" onclick="location.href='http://www.google.com'">
                        </fieldset>
                    </td>
                </tr>
            </table>
            <br>
            <br>
            <div class="specs">
                <h1>Specificatii:</h1>
                <table>
                    <tr>
                        <th>Memorie cache:</th>
                        <td>Mult</td>
                    </tr>
                    <tr>
                        <th>Socket</th>
                        <td>1150</td>
                    </tr>
                    <tr>
                        <th>Frecvență procesor(MHz)</th>
                        <td>3200</td>
                    </tr>
                    <tr>
                        <th>Mod de operare(biti)</th>
                        <td>64</td>
                    </tr>
                    <tr>
                        <th>Numar nuclee</th>
                        <td>4</td>
                    </tr>
                    <tr>
                        <th>Tehnologie de fabricatie(nm)</th>
                        <td>22</td>
                    </tr>
                    <tr>
                        <th>Cooler</th>
                        <td>Box</td>
                    </tr>
                    <tr>
                        <th>Putere termica(W)</th>
                        <td>84</td>
                    </tr>
                    <tr>
                        <th>Altele</th>
                        <td>
                            <ul>
                                <li>Intel HD Graphics 4600</li>
                                <li>AES New Instructions</li>
                                <li>Intel Identity Protection</li>
                            </ul>
                        </td>
                    </tr>


                </table>
            </div>
        </div>
        <?php include('footer.php') ?>

    </body>

</html>