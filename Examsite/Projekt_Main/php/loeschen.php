<?php session_start(); 
 if (isset($_SESSION['Benutzername']))
 { }
 else {
    header("Location: login.php");
 }
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil löschen</title>
</head>
<body>
    <?php include "nav.php";   ?>
    <h1>Benutzerprofil löschen</h1>



            <form action="loeschen.php" method="POST">
                <!-- <input type="checkbox" value="J" id="Bestaetigung" name="Bestaetigung">     -->
                <label for="Bestaetigung"><?=$_SESSION['Benutzername']?> Möchtest Du Dein Profil
                 <strong>ENDGÜLTIG</strong>
                 löschen?</label><br>

                <button>Ja, löschen</button>
                <a href="index.php">Abbrechen</a>
            </form>


 <?php  
 

$con = mysqli_connect("localhost", "root", "", "benutzerdb");
$sql = "DELETE FROM benutzertb WHERE BenutzerID=" . $_SESSION['BenutzerID'];
mysqli_query($con, $sql);
// $zeilen = mysqli_affected_rows($con);

// if ($zeilen == 1) {
//     header("Location: index.php");
// }
// else {
//     echo "Profil wurde nicht gelöscht.";
// }

session_destroy();

$_SESSION = array();
mysqli_close($con);

header("Location: index.php");








?>





            <?php include "footer.php";    ?>
</body>
</html>