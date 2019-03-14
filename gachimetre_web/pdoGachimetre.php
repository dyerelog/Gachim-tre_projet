<?php

include "pdoConnexion.php";

class PdoGachimetre {

	public static function getPoidsJournee($date){
		try {
            $objPdo = PdoConnexion::getPdoConnexion();
            $req = $objPdo->prepare("SELECT poids FROM poids_jour WHERE date = :date;");

			$req->bindParam(':date', $date, PDO::PARAM_STR);
			$req->execute();
			$res = $req->fetchAll();
			$req->closeCursor();

            return $res;
        } 

        catch (Exception $ex) {
            return false;
        }
	}

    public static function getPoidsSemaine(){
        try {
            $objPdo = PdoConnexion::getPdoConnexion();
            $req=$objPdo->prepare("SELECT poids FROM poids_semaine;");
           
			$req->execute();
			$res = $req->fetchAll();
			$req->closeCursor();

            return $res;
        } 

        catch (Exception $ex) {
            return false;
        }
    }

    public static function getDernierGachis(){
        try {
            $objPdo = PdoConnexion::getPdoConnexion();
            $req=$objPdo->prepare("SELECT poids FROM poids_jour ORDER BY date DESC, heure DESC LIMIT 1;");
			
			$req->execute();
			$res = $req->fetchAll();
			$req->closeCursor();

            return $res;
        } 

        catch (Exception $ex) {
            return false;
        }
    }

    public static function getGachisParJour(){
        try {
            $objPdo = PdoConnexion::getPdoConnexion();
            $req=$objPdo->prepare("SELECT poids FROM poids_semaine ORDER BY num_jour;");

			$req->execute();
			$res = $req->fetchAll();
			$req->closeCursor();

            return $res;
        } 

        catch (Exception $ex) {
            return false;
        }
    }

    public static function getPoidsTotal(){
        try {
            $objPdo = PdoConnexion::getPdoConnexion();
            $req = $objPdo->prepare("SELECT poids FROM poids_total;");

            $req->execute();
            $res = $req->fetchAll();
            $req->closeCursor();

            return $res;
        } 

        catch (Exception $ex) {
            return false;
        }
    }
}

?>
