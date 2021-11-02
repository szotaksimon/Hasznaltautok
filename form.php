<?php

require_once 'db.php';
require_once 'hirdetes.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $deleteId = $_POST['deleteId'] ?? '';
    if($deleteId !== '') {
        Hirdetes::torol($deleteId);
    } else {
        $markaErr = $modellErr = $kivitelErr = $evjaratErr = $arErr = $uzemanyagErr = $allapotErr = $leirasErr = ""; 
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(empty($_POST["marka"])){
                $markaErr = "A márka megadása kötelező.";
            }
            if(empty($_POST["modell"])){
                $modellErr = "A modell megadása kötelező.";
            }
            if(empty($_POST["kivitel"])){
                $kivitelErr = "A kivitel megadása kötelező.";
            }
            if(empty($_POST["evjarat"])){
                $evjaratErr = "Az évjárat megadása kötelező.";
            }
            if(empty($_POST["ar"])){
                $arErr = "Az ár megadása kötelező.";
            }
            if($_POST["ar"] < 0){
                $arErr = "Az ár nem lehet kisebb 0-nál."
            }
            if(empty($_POST["uzemanyag"])){
                $uzemanyagErr = "Az üzemanyag megadása kötelező.";
            }
            if(empty($_POST["allapot"])){
                $allapotErr = "Az állapot megadása kötelező.";
            }
            if(empty($_POST["leiras"])){
                $leirasErr = "A leírás megadása kötelező.";
            }

        }





        $ujMarka = $_POST['marka'] ?? '';
        $ujModell = $_POST['modell'] ?? '';
        $ujKivitel = $_POST['kivitel'] ?? '';
        $ujEvjarat = $_POST['evjarat'] ?? '';
        $ujAr = $_POST['ar'] ?? '';
        $ujUzemanyag = $_POST['uzemanyag'] ?? '';
        $ujAllapot = $_POST['allapot'] ?? '';
        $ujLeiras = $_POST['leiras'] ?? '';

        $ujHirdetes = new Hirdetes($ujMarka, $ujModell, $ujKivitel, $ujEvjarat, $ujAr, $ujUzemanyag, $ujAllapot, $ujLeiras);
        $ujHirdetes ->uj();
    }
}
header('Location: index.php');