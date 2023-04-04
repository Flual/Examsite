<h1>Bitte Daten ausfüllen</h1>
<form action="registrieren.php" method='POST'>´

<?php
                
                $sql = "SELECT Anrede, Vorname, Nachname, PLZ FROM tperson ";
               
                ?>

<p>Anrede</p>
       
       <?php
       
       $con = mysqli_connect("localhost", "root" , "", "benutzerdb", 3306);
       $sql = "SELECT AnredeID, Anrede  FROM tanrede ORDER BY AnredeID";
       $daten = mysqli_query($con, $sql);
       $anzahl = mysqli_num_rows($daten);

       if($anzahl > 0){
           while ( $zeile = mysqli_fetch_array($daten)){
               ?>
               <!-- Hier ist wieder html-->
               <label for="<?= $zeile["Anrede"] ?>"><?= $zeile["Anrede"] ?></label>
               <input type="radio" name="Anrede" value="<?= $zeile["AnredeID"] ?>" id="<?= $zeile["Anrede"] ?>"><br>
               <?php
           }
       }
       else{
           echo "<p>Keine Anreden verfügbar.</p>";
       }
       mysqli_free_result($daten);
      
       ?>


        <br>

        <label for="Vorname">Vorname</label>
        <input type="text" name="vorname" required id="vorname">

        <br>

        <label for="Nachname">Nachname</label>
        <input type="text" name="nachname" required id="nachname">

        <br>

        <label for="Email">E-Mail</label>
        <input type="text" name="email" id="email">

        <br>

        <label for="">Benutzername</label>
        <input type="text" name="username" required id="username">

        <br>

        <label for="Passwort">Passwort</label>
        <input type="password" name="password" required id="password">

        <br>

        <label for="Passwortzwei">Passwort wiederholen</label>
        <input type="password" name="passwordtwo" required id="passwordzwei">

            <br>

    <button type="submit">Registrieren</button>
    </div>

</form>