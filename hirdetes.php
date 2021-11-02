<?php

class Hirdetes {
    private $id;
    private $marka;
    private $modell;
    private $kivitel;
    private $evjarat;
    private $ar;
    private $uzemanyag;
    private $allapot;
    private $leiras;
    private $datum;

    public function __construct(string $marka, string $modell, string $kivitel, string $evjarat, int $ar, string $uzemanyag, string $allapot, string $leiras){
        $this->marka = $marka;
        $this->modell = $modell;
        $this->kivitel = $kivitel;
        $this->evjarat = $evjarat;
        $this->ar = $ar;
        $this->uzemanyag = $uzemanyag;
        $this->allapot = $allapot;
        $this->leiras = $leiras;
    }

    public function uj(){
        global $db;

        $db->prepare('INSERT INTO hirdetes (marka, modell, kivitel, evjarat, ar, uzemanyag, allapot, leiras)
                        VALUES (:marka, :modell, :kivitel, :evjarat, :ar, :uzemanyag, :allapot, :leiras)')
            ->execute([
                ':marka' => $this->marka,
                ':modell' => $this->modell,
                ':kivitel' => $this->kivitel,
                ':evjarat' => $this->evjarat,
                ':ar' => $this->ar,
                ':uzemanyag' => $this->uzemanyag,
                ':allapot' => $this->allapot,
                ':leiras' => $this->leiras,
            ]);
    }

    public function mentes() {
        global $db;
        

        $db->prepare('UPDATE hirdetes SET marka=:marka, modell=:modell, kivitel=:kivitel, evjarat=:evjarat, ar=:ar, uzemanyag=:uzemanyag, allapot=:allapot, leiras=:leiras
                        WHERE id = :id')
            ->execute([
                ':id' => $this->id,
                ':marka' => $this->marka,
                ':modell' => $this->modell,
                ':kivitel' => $this->kivitel,
                ':evjarat' => $this->evjarat,
                ':ar' => $this->ar,
                ':uzemanyag' => $this->uzemanyag,
                ':allapot' => $this->allapot,
                ':leiras' => $this->leiras,
            ]);
    }


    public function setMarka($marka) {
        $this->marka=$marka;
    }
    public function setModell($modell) {
        $this->modell=$modell;
    }
    public function setKivitel($kivitel) {
        $this->kivitel=$kivitel;
    }
    public function setEvjarat($evjarat) {
        $this->evjarat=$evjarat;
    }
    public function setAr($ar) {
        $this->ar=$ar;
    }
    public function setUzemanyag($uzemanyag) {
        $this->uzemanyag=$uzemanyag;
    }
    public function setAllapot($allapot) {
        $this->allapot=$allapot;
    }
    public function setLeiras($leiras) {
        $this->leiras=$leiras;
    }

    
    public function getId() : ?int {
        return $this->id;
    }

    public function getById($id) : Hirdetes {
        global $db;
        
        $elem = $db->query("SELECT * FROM hirdetes WHERE id = " . $id)->fetch();
        $hirdetes = new Hirdetes($elem['marka'],
        $elem['modell'],
        $elem['kivitel'],
        $elem['evjarat'],
        $elem['ar'],
        $elem['uzemanyag'],
        $elem['allapot'],
        $elem['leiras']);
        $hirdetes->datum=$elem['datum'];
        $hirdetes->id = $elem['id'];
        return $hirdetes;
    }


    public function getMarka() : string {
        return $this->marka;
    }

    public function getDatum() : string {
        return $this->datum;
    }

    public function getModell() : string {
        return $this->modell;
    }

    public function getKivitel() : string {
        return $this->kivitel;
    }

    public function getEvjarat() : string {
        return $this->evjarat;
    }

    public function getAr() : int {
        return $this->ar;
    }

    public function getUzemanyag() : string {
        return $this->uzemanyag;
    }

    public function getAllapot() : string {
        return $this->allapot;
    }

    public function getLeiras() : string {
        return $this->leiras;
    }

    public static function torol(int $id){
        global $db;

        $db->prepare('DELETE FROM hirdetes WHERE id = :id')
        ->execute([':id' => $id]);
    }

    public static function osszes() : array {
        global $db;

        $t = $db->query("SELECT * FROM hirdetes ORDER BY ar DESC")
        ->fetchAll();
        $eredmeny = [];

        foreach ($t as $elem){
            $hirdetes = new Hirdetes($elem['marka'],
                                     $elem['modell'],
                                     $elem['kivitel'],
                                     $elem['evjarat'],
                                     $elem['ar'],
                                     $elem['uzemanyag'],
                                     $elem['allapot'],
                                     $elem['leiras']);
            $hirdetes->datum=$elem['datum'];
            $hirdetes->id = $elem['id'];
            $eredmeny[] = $hirdetes;
        }

        return $eredmeny;
    }
}