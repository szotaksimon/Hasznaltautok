<?php

require_once 'db.php';
require_once 'hirdetes.php';

$hirdetesId = $_GET['id'] ?? null;

if($hirdetesId === null) {
    header('Location: index.php');
    exit();
}


$hirdetes = Hirdetes::getById($hirdetesId);


if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ujMarka = $_POST['marka'] ?? '';
    $ujModell = $_POST['modell'] ?? '';
    $ujKivitel = $_POST['kivitel'] ?? '';
    $ujEvjarat = $_POST['evjarat'] ?? '';
    $ujAr = $_POST['ar'] ?? '';
    $ujUzemanyag = $_POST['uzemanyag'] ?? '';
    $ujAllapot = $_POST['allapot'] ?? '';
    $ujLeiras = $_POST['leiras'] ?? '';

    $hirdetes->setMarka($ujMarka);
    $hirdetes->setModell($ujModell);
    $hirdetes->setKivitel($ujKivitel);
    $hirdetes->setEvjarat($ujEvjarat);
    $hirdetes->setAr($ujAr);
    $hirdetes->setUzemanyag($ujUzemanyag);
    $hirdetes->setAllapot($ujAllapot);
    $hirdetes->setLeiras($ujLeiras);


    $hirdetes->mentes();
    header('Location: index.php');
    exit();
}

?><!DOCTYPE html>
<html>
    <head>
        <title>Szerkesztés</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="style.css">
        <script src="main.js"></script>
    </head>
    <body>
        <div class="container-fluid" id="header">
            <p id="logo">HASZTNÁLTAUTÓK</p>
            <p id="szerkesztes">Szerkesztés</p>
        </div>
        <div class="container-fluid">
            <form method="POST" onsubmit="validate()">
                <div class="row" id="inputok">
                    <div class="col-sm-12">
                        <input list="marka-list" type="text" name="marka" placeholder="Márka" value="<?php echo $hirdetes->getMarka();?>" required>
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
        
                        <input "type="text" name="modell" placeholder="Modell" value="<?php echo $hirdetes->getModell();?>" required>
        
                        <input list="kivitel-list" type="text" name="kivitel" placeholder="Kivitel" value="<?php echo $hirdetes->getKivitel();?>" required>
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
        
                        <input list="evjarat-list" type="number" name="evjarat" placeholder="Gyártási év" value="<?php echo $hirdetes->getEvjarat();?>" required>
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
        
                        <input type="number" name="ar" placeholder="Ár" value="<?php echo $hirdetes->getAr();?>" required>
        
                        <input list="uzemanyag-list" type="text" name="uzemanyag" placeholder="Üzemanyag" value="<?php echo $hirdetes->getUzemanyag();?>" required>
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
        
                        <input list="allapot-list" type="text" name="allapot" placeholder="Állapot" value="<?php echo $hirdetes->getAllapot();?>" required>
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
                <div class="row" id="textarea-submit-edit-page">
                    <div class="col-sm-12">
                        <textarea name="leiras" cols="60" rows="3"  placeholder="Az autóról.." required><?php echo $hirdetes->getLeiras();?></textarea>
                        <input type="submit" value="Szerkeszt" id="szerkeszt-button">
                    </div>
                </div>           
        </div>
            </form>
    </body>
</html>