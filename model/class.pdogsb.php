<?php
/** 
 * Classe d'accès aux données. 
 
 * Utilise les services de la classe PDO
 * pour l'application GSB
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO 
 * $monPdoGsb qui contiendra l'unique instance de la classe
 
 * @package default
 * @author Cheri Bibi
 * @version    1.0
 * @link       http://www.php.net/manual/fr/book.pdo.php
 */

class PdoGsb{   		
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=gsbfrais';   		
      	private static $user='root' ;    		
      	private static $mdp='' ;	
		private static $monPdo;
		private static $monPdoGsb=null;
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
	private function __construct(){
    	PdoGsb::$monPdo = new PDO(PdoGsb::$serveur.';'.PdoGsb::$bdd, PdoGsb::$user, PdoGsb::$mdp); 
		PdoGsb::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		PdoGsb::$monPdo = null;
	}
/**
 * Fonction statique qui crée l'unique instance de la classe
 
 * Appel : $instancePdoGsb = PdoGsb::getPdoGsb();
 
 * @return l'unique objet de la classe PdoGsb
 */
	public  static function getPdoGsb(){
		if(PdoGsb::$monPdoGsb==null){
			PdoGsb::$monPdoGsb= new PdoGsb();
		}
		return PdoGsb::$monPdoGsb;  
	}
/**
 * Test : retourne les informations d'un visiteur par son id
 
 * @param $id 
 * @return le nom et le prénom sous la forme d'un tableau associatif 

*/
	
	public function getInfosVisiteur($id){
		$req = "SELECT visiteur.nom as nom, visiteur.prenom as prenom from visiteur 
		where visiteur.id = '$id' ";
		$rs = PdoGsb::$monPdo->query($req);
		$ligne = $rs->fetch();
		return $ligne;
	}

    public function getLesFrais($id)
   {
		$req= "SELECT lignefraisforfait.mois, lignefraisforfait.idVisiteur, fichefrais.idEtat, fichefrais.dateModif, etat.libelle,
				SUM((CASE WHEN idFraisForfait = 'REP' THEN quantite ELSE 0 END))* montant REP,
				SUM((CASE WHEN idFraisForfait = 'NUI' THEN quantite ELSE 0 END))* montant NUI,
				SUM((CASE WHEN idFraisForfait = 'ETP' THEN quantite ELSE 0 END))* montant ETP, 
				SUM((CASE WHEN idFraisForfait = 'KM' THEN quantite ELSE 0 END))* montant KM
				FROM lignefraisforfait 
				INNER JOIN fraisforfait ON lignefraisforfait.idFraisForfait=fraisforfait.id
				INNER JOIN fichefrais ON  lignefraisforfait.idVisiteur=fichefrais.idVisiteur
				INNER JOIN etat ON fichefrais.idEtat=etat.id
				where lignefraisforfait.idVisiteur='$id'
				GROUP BY  mois";
		$res=PdoGsb::$monPdo->query($req);
		$fraisF=$res->fetchAll();
		return $fraisF;
	}	

	public function getFraisH($id)
	{
		$req= "SELECT idVisiteur, montantValide, fichefrais.mois, fichefrais.dateModif, fichefrais.idEtat 
				FROM fichefrais 
				where fichefrais.idVisiteur = '$id'";

		$res=PdoGsb::$monPdo->query($req);
		$fraisHorsF=$res->fetchAll();
		return $fraisHorsF;
	}

	public function getLesVisiteurs(){
		$req= "select id from visiteur";
		$res=PdoGsb::$monPdo->query($req);
		$lesVisiteurs=$res->fetchAll();
		return $lesVisiteurs;
	}
}

?>