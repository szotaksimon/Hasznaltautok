<?php

require_once 'db.php';
require_once 'hirdetes.php';


$hirdetesek = Hirdetes::osszes();

?><!DOCTYPE html>
<html>
    <head>
        <title>Hirdetés</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="style.css">
        <script src="main.js"></script>
    </head>
    <body>
        <div class="container-fluid" id="header">
            <p id="logo">HASZTNÁLTAUTÓK</p>
        </div>
        <div class="container-fluid">
            <form action="form.php" method="POST" action="form-handler" onsubmit="return checkForm(this)">
                <div class="row" id="inputok">
                    <div class="col-sm-12">
                        <input list="marka-list" type="text" name="marka" placeholder="Márka" id="marka" required>
                        <datalist id="marka-list">
                            <option value="Audi">
                            <option value="Alfa Romeo">
                            <option value="Aston Martin">
                            <option value="BMW">
                            <option value="Cadillac">
                            <option value="Chevrolet">
                            <option value="Chrysler">
                            <option value="Citroën">
                            <option value="Dacia">
                            <option value="Daihatsu">
                            <option value="Dodge">
                            <option value="Fiat">
                            <option value="Ford">
                            <option value="Honda">
                            <option value="Hyundai">
                            <option value="Lada">
                            <option value="Jaguar">
                            <option value="Lancia">
                            <option value="Lincoln">
                            <option value="Lotus">
                            <option value="Mazda">
                            <option value="Mercedes-Benz">
                            <option value="Mitsubishi">
                            <option value="Nissan">
                            <option value="Opel">
                            <option value="Peugeot">
                            <option value="Porsche">
                            <option value="Rover">
                            <option value="Saab">
                            <option value="Skoda">
                            <option value="Seat">
                            <option value="Subaru">
                            <option value="Suzuki">
                            <option value="Toyota">
                            <option value="Trabant">
                            <option value="Volkswagen">
                            <option value="Volvo">
                        </datalist>
        
                        <input "type="text" name="modell" placeholder="Modell" id="modell" required>
        
                        <input list="kivitel-list" type="text" name="kivitel" id="kivitel" placeholder="Kivitel" required>
                        <datalist id="kivitel-list">
                            <option value="Pickup">
                            <option value="Terepjáró">
                            <option value="Cabrio">
                            <option value="Coupe">
                            <option value="Egyterű">
                            <option value="Ferdehátú">
                            <option value="Kombi">
                            <option value="Kisbusz">
                            <option value="Lépcsőshátú">
                            <option value="Sedan">
                            <option value="Sport">
                            <option value="Crossover">
                            <option value="Mopedautó">
                            <option value="Egyéb">
                        </datalist>
        
                        <input list="evjarat-list" type="number" name="evjarat" id="evjarat" placeholder="Gyártási év" required>
                        <datalist id="evjarat-list">
                            <option value="1930">
                            <option value="1940">
                            <option value="1950">
                            <option value="1960">    
                            <option value="1970">
                            <option value="1980">
                            <option value="1990">
                            <option value="2000">
                            <option value="2010">
                            <option value="2020">
                        </datalist>
        
                        <input type="number" name="ar" placeholder="Ár" id="ar" required>
        
                        <input list="uzemanyag-list" type="text" name="uzemanyag" id="uzemanyag" placeholder="Üzemanyag" required>
                        <datalist id="uzemanyag-list">
                            <option value="Benzin">
                            <option value="Dízel">
                            <option value="Benzin/Gáz">
                            <option value="Hibrid">
                            <option value="Elektromos">
                            <option value="Etanol">
                            <option value="Biodízel">
                            <option value="Gáz">
                        </datalist>
        
                        <input list="allapot-list" type="text" name="allapot" id="allapot" placeholder="Állapot" required>
                        <datalist id="allapot-list">
                            <option value="Normál">
                            <option value="Kitűnő">
                            <option value="Megkímélt">
                            <option value="Újszerű">
                            <option value="Sérülésmentes">
                            <option value="Sérült">
                            <option value="Hiányos">
                            <option value="Fődarab hibás">
                        </datalist>
                    </div>
                </div>
                <div class="row" id="textarea-submit">
                    <div class="col-sm-12">
                        <textarea name="leiras" cols="60" rows="3" id="leiras"  placeholder="Az autóról.." required></textarea>
        
                        <input type="submit" value="OK" id="input-submit-button">
                    </div>
                </div>
                

            </form>
        </div>
    

        <div class="container" id="kozep">
            <p>Használtautó hirdetései</p>
        </div>
    <div class="container" id="kiirat">
        <div class="row">
                <?php
                    foreach($hirdetesek as $hirdetes) {
                        echo "<div class='col-sm-4'>";
                        echo "<div class='card-header'>" . $hirdetes->getMarka() . "</div>";
                        echo "<div class='card-body'>";
                        echo "<p>Modell: " . $hirdetes->getModell() . "</p>";
                        echo "<p>Kivitel: " . $hirdetes->getKivitel() . "</p>";
                        echo "<p>Évjárat: " . $hirdetes->getEvjarat() . "</p>";
                        echo "<p>Ár: " . $hirdetes->getAr() . " Ft</p>";
                        echo "<p>Üzemanyag: " . $hirdetes->getUzemanyag() . "</p>";
                        echo "<p>Állapot: " . $hirdetes->getAllapot() . "</p>";
                        echo "<p>Feladás dátuma: " . $hirdetes->getDatum() . "</p>";
                        echo "<p id='leiras'>" . $hirdetes->getLeiras() . "</p>";
                        echo "</div>";
                        echo "<form action='form.php' method='POST'>";
                        echo "<input type='hidden' name='deleteId' value='" . $hirdetes->getId() . "'>";
                        echo "<div class='card-footer'>";
                        echo "<button type='submit' id='torles-button'>Törlés</button>";
                        echo "</form>";
                        echo "<a href='edit.php?id=" . $hirdetes->getId() . "' class='szerkeszt-button'>Szerkeszt</a>";
                        echo "</div>";
                        echo "</div>";
                    }      
                ?>
        </div>
    </div>

    </body>
</html>