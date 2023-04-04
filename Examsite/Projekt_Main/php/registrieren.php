<?php include "sitzung.php" ?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrieren</title>
    <link rel="stylesheet" href="../CSS/styles.css">

</head>
<body>
<?php include "nav.php";?>
<?php  
    include "registrierenformular.php";
    $con = mysqli_connect("localhost","root","","benutzerdb", 3306);

    if($_SERVER["REQUEST_METHOD"]=="POST") { 

    

        $username = $_POST['username'];
        $password =$_POST['password'];
        $passwordtwo = $_POST['passwordtwo'];
        $anrede = $_POST['Anrede'];
        $vorname = $_POST['vorname'];
        $nachname = $_POST['nachname'];
        $email =   $_POST['email'];  
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $passwordHashtwo = password_hash($passwordtwo, PASSWORD_DEFAULT);

            if (isset($passwordHash) == isset($passwordHashtwo))
            {
                $sql = "INSERT INTO benutzertb (Benutzername, Passwort, Anrede, Vorname, Nachname, EMail)";
                $sql .= "Values ('" . $username . "', '" . $passwordHash . "', " . $anrede . ", '" . $vorname . "', '" . $nachname . "', '" . $email . "')"; 
            
                //echo $sql;
                mysqli_query($con, $sql);
                $anzDatensaetze = mysqli_affected_rows($con);

                if($anzDatensaetze == 1){
                    echo "Benutzer erstellt!";
                }
                else{
                    echo "Problem beim Erstellen.";
                }
                header("Location: login.php");
            }
            else 
            {
                echo"Passw&oumlrterr stimmen nicht überein!";
            }
            mysqli_close($con);

    }
    
?>




<?php include "footer.php";?>
</body>
</html>