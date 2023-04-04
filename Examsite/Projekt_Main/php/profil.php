<?php include "sitzung.php";
 if (isset($_SESSION['Benutzername']))
 { 

 }
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
    <title>Mein Profil</title>
</head>
<body>
    <?php include "nav.php";
    if (isset($_SESSION["Benutzername"])){
        ?>
<div id="inhalt">
    <div>
            
            <h1>Hallo, <?php echo $_SESSION["Benutzername"]; ?>!</h1>
            <p>Wie geht's uns Heute?</p>

            
            
    </div>
    <?php }?>

    <?php
        $con = mysqli_connect("localhost", "root", "", "benutzerdb");
        echo "<table>";
        echo "<tr><th>Anrede</th><th>Vorname</th><th>Nachname</th><th>Benutzername</th><th>Email</th></tr>";

        $sql = "SELECT * FROM benutzertb WHERE BenutzerID=" . $_SESSION['BenutzerID'];

        $daten = mysqli_query($con, $sql); //Führt die Abfrage aus
        $benutzerdaten = mysqli_fetch_array($daten);

        echo "<tr>";
            echo "<td>" . $benutzerdaten['Anrede'] . "</td>";
            echo "<td>" . $benutzerdaten['Vorname'] . "</td>";
            echo "<td>" . $benutzerdaten['Nachname'] . "</td>";
            echo "<td>" . $benutzerdaten['Benutzername'] . "</td>";
            echo "<td>" . $benutzerdaten['EMail'] . "</td>";


        echo "</tr>";
        mysqli_close($con);
        echo "</table></div>";


        
        ?>
<form action="profilbearbeiten.php">
        <input type="submit" value="Profil bearbeiten">
</form>

<form action="logout.php">
        <input type="submit" value="Logout">
</form>

<form action="loeschen.php">
        <input type="submit" value="Profil löschen">
</form>

    <?php include "footer.php"?>
</body>
</html>