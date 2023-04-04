<?php include "sitzung.php" ?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../CSS/styles.css">

</head>
<body>
<?php include "nav.php";?>

<?php
        if($_SERVER["REQUEST_METHOD"]=="GET") {
            include "formular.htm";
        }
        else{
            //Prüfe ob Zugangsdaten stimmen
            $Fehler = false;
            //1.Sind genau zwei elemente vorhanden (honeypot
            if(count($_POST)==2){
                //sind genau die Elemente Post und PW vorhanden?
                if (isset($_POST["username"]) && isset($_POST["password"])) {
                  
                    $username = strtolower(trim($_POST["username"]));
                    $password = trim($_POST["password"]);

                    //Mindestens 3 Zeichen bei Username
                    //Mindestens 6 Zeichen bei Username
                    $anzUsername = strlen($username);
                    $anzPassword = strlen($password);
                    
                    if($anzUsername >= 3 && $anzPassword >= 6){
                        
                        $con = mysqli_connect("localhost", "root" , "", "benutzerdb", 3306);
                        
                        $sql = "SELECT BenutzerID, Passwort FROM benutzertb ";
                        $sql .= "WHERE Benutzername='" . $username . "' ";


                        //echo $sql;//für Fehlersuche only in der datenbank
                        $daten = mysqli_query($con, $sql); 
                        $anzahl = mysqli_num_rows($daten);

                        if ($anzahl==1) {
                            $zeile = mysqli_fetch_array($daten);
                            $HashAusDB = $zeile["Passwort"];

                            if(password_verify($password, $HashAusDB)) {
                                $_SESSION["Angemeldet"] = "J";
                                $_SESSION["Benutzername"] = $username;
                                $_SESSION['BenutzerID']= $zeile['BenutzerID'];
                                
                               header("Location: profil.php");
                               exit();
                            }
                            else{
                                $Fehler = true;
                                echo "Anmeldung nicht möglich6";
                            }
                        }
                        else{
                            $Fehler = true;
                            echo "Anmeldung nicht möglich5";
                        }


                        mysqli_free_result($daten);
                        mysqli_close($con);
                    }
                    else{
                        $Fehler = true;
                        echo "Anmeldung nicht möglich3";
                    }
                }
                else{
                    $Fehler = true;
                    echo "Anmeldung nicht möglich2";
                }
            }
            else{
                $Fehler = true;
                echo "Anmeldung nicht möglich1";
            }
        }
    ?>








<?php include "footer.php";?>
</body>
</html>