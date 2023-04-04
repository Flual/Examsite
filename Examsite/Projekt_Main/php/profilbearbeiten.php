<?php include "sitzung.php";
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
    <title>Profil Bearbeiten</title>
</head>
<body>
<?php include "nav.php";?>
<?php    
    $con = mysqli_connect("localhost", "root", "", "benutzerdb");
    $sql = "SELECT * FROM benutzertb WHERE BenutzerID=" . $_SESSION['BenutzerID'];
    $daten = mysqli_query($con, $sql);
    $benutzerdaten = mysqli_fetch_array($daten);
    mysqli_free_result($daten);
    ?>
    <!-- $_SESSION['BenutzerID']= $zeile['BenutzerID']; -->
    <!-- HTML -->
    <div id="inhalt">
        <form action="profilbearbeiten.php" method="POST">
            <p>Vorname</p>
            <input type="text" name="vorname" id="vorname" required value="<?=$benutzerdaten['Vorname']?>">
            <p>Nachname</p>
            <input type="text" name="nachname" id="nachname" required value="<?=$benutzerdaten['Nachname']?>">
            <p>E-Mail</p>
            <input type="text" name="email" id="email" required value="<?=$benutzerdaten['EMail']?>">
            <p>Benutzername</p>
            <input type="text" name="username" id="username" required value="<?=$benutzerdaten['Benutzername']?>">
            <p>Passwort</p>
            <input type="password" name="password" id="password" required value="<?=$benutzerdaten['Passwort']?>"><br>
            <input type="submit" >
            <a href="profil.php" id="linkprofilbearbeiten">zur&uumlck</a>
        </form>
        
    </div>
    

<?php
    $con = mysqli_connect("localhost", "root", "", "benutzerdb");
    $sql = "SELECT * FROM benutzertb";
    $daten = mysqli_query($con, $sql);
    $benutzerdaten = mysqli_fetch_array($daten);
    $vorname = $_POST['vorname'];
    $nachname = $_POST['nachname'];
    $email =   $_POST['email'];  
    $username = $_POST['username'];
    $password =$_POST['password'];
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);


    //Fehler = sql warning
    $sqlupdate = "UPDATE benutzertb SET Vorname=". "'$vorname'" . ", Nachname=". "'$nachname'" . ", EMail=". "'$email'" . ", Benutzername=". "'$username'" . ", Passwort=". "'$passwordHash' WHERE BenutzerID= " . $_SESSION['BenutzerID'];
    mysqli_query($con, $sqlupdate);

    
?>


<?php

    mysqli_close($con);
    
?>
<?php include "footer.php"; ?>

</body>
</html>