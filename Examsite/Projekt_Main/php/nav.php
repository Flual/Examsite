<?php include "functions.php";?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <script src="../javascript/burgermenu.js"></script>
         <link href="../CSS/styles.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       
    </head>

    <body>
        <?php
            echo "<header>";
            // Diese Navi is auf der Desktopversion sichtbar
            echo "<nav class='navi'>";
                echo "<ul>";
                    echo "<li><a href='index.php'>Home</a></li>";
                    echo "<li><a href='index.php#content'>&Uumlber uns</a></li>";
                    echo "<li><img src='../images/kein-verlust.png'></li>";
                    echo "<li><a href='index.php#carouseltitle'>Projekte</a></li>";

                    //Letzte li ändern wenn man nicht eingeloggt ist steht login ansonsten mein profil
                    //$logincheck = logincheck();
                    if (isset($_SESSION['Benutzername']))
                    {
                    echo "<li><a href='profil.php'>Mein Profil</a></li>";}
                    else {
                        echo "<li><a href='login.php'>Login</a></li>";
                    }
                echo "</ul>";
                echo "</nav>";

                // Diese navi istt das Burgermenu und nur in der mobilen ansicht scihtbar
                echo"<div class='mobile-container'>";

                echo "<div class='topnav'>"; 
                echo "<div id='mylinks'><img src='../images/navbg.png'>";
                    echo "<a href='index.php'>Home</a><br>";
                    echo "<a href='index.php#content'>&Uumlber uns</a>";
                    echo "<a href='index.php#carouseltitle'>Projekte</a>";

                    //Letzte li ändern wenn man nicht eingeloggt ist steht login ansonsten mein profil
                    //$logincheck = logincheck();
                    if (isset($_SESSION['Benutzername']))
                    {
                    echo "<a href='profil.php'>Mein Profil</a>";}
                    else {
                        echo "<a href='login.php'>Login</a>";
                    }
                echo "</div>";
                echo "<a href='javascript:void(0);' class='icon' onclick='burger();'><i class='fa fa-bars'></i></a>";
                echo "</div>";
                echo "</div>";

            echo "</header>";

           // echo "<img src='../images/kein-verlust.png' class='headimg'>";
        ?>



    </body>
</html>