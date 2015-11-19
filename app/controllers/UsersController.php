<?php


use Ajax\bootstrap\html\html5\HtmlSelect;
class UsersController extends DefaultController{
	public function initialize(){
		parent::initialize();
		$this->model="User";
	}

	public function frmAction($id=NULL){
		$user=$this->getInstance($id);
		$select=new HtmlSelect("role","Rôle","Sélectionnez un rôle...");
		$select->fromArray(array("admin","user","author"));
		$select->setValue($user->getRole());
		$select->compile($this->jquery,$this->view);
		$this->view->setVars(array("user"=>$user,"siteUrl"=>$this->url->getBaseUri(),"baseHref"=>$this->dispatcher->getControllerName()));
		parent::frmAction($id);
	}
	


	




	public function projectsAction($id=null){

		$user=$this->getInstance($id);
		// Sélectionne tous les projets du client
		$projets=call_user_func("Projet::find",array("idClient=".$user->getId()));

		// date d'aujourd'hui
		$today = "20" . date("y-m-d");
		// convertit la date d'aujourd'hui en secondes
		$debut_ts = strtotime($today);
		// instancie les arraylist utiles
		$NbJourAvantFinProjet = array();
		$progressbar = array();
		$pourcentprogressbar = array();

		// Pour chaque projet du client
		foreach ($projets as $elt) {
			// convertit en secondes la date de fin de ce projet
			$fin_ts = strtotime($elt->getDateFinPrevue());
			// calcul le nombre de secondes restantes jusqu'à la fin du projet
			$diff = $fin_ts - $debut_ts;
			// convertit en jour
			$nbjours = round($diff / 86400 );
			// place le nombre de jour restant dans l'arraylist $NbJourAvantFinProjet, avec comme id, l'id du projet
			$NbJourAvantFinProjet[$elt->getId()] = $nbjours;

			// Sélectionne tous les usecases du projet
			$usecase=call_user_func("UseCase::find",array("idProjet=".$elt->getId()));
			// instancie les variables
			$var = 0;
			$totalpoids = 0;

			// Pour chaque usecase du projet
			foreach ($usecase as $e) {
				// poid_de_la_usecase x avancement_de_la_usecase
				$pourcentAvancement = $e->getPoids() * $e->getAvancement();
				// on incrémente $var du calcul çi-dessus
				$var = $var + $pourcentAvancement;
				// on incrémente $totalpoids du poids de la usecase
				$totalpoids = $totalpoids + $e->getPoids();
			}

			// on calcul l'avancement du projet en %
			$avancement = $var / $totalpoids;

			// on calcul le tps total du projet en jour
			$TpsTotal = round((strtotime($elt->getDateFinPrevue()) - strtotime($elt->getDateLancement())) / 86400);
			// on calcul l'avanceent du projet en % en terme de jours
			$cond = $nbjours / $TpsTotal;

			// on attribu une couleur à la variable $couleur en fonction de 
			// l'avancement en % du projet en terme de travail accompli comparé à l'avancement en % en terme de jours du projet passé
			if ($cond <= $avancement){
				// si l'avancement est supérieur au % de tps passé
				$couleur = "success";
			}
			elseif ($cond > $avancement){
				// si l'avancement est inférieur au % de tps passé
				$couleur = "warning";
			}
			else{
				// si la date de fin de projet est dépassé
				$couleur = "danger";
			}

			// place la progressbar (avec comme id, l'id du projet) bootstrap dans l'arraylist $progressbar avec les variables calculées au dessus
			$progressbar[$elt->getId()] = $this->jquery->bootstrap()->htmlProgressbar("pb5",$couleur,$avancement)->setStriped(true);
			// concatene l'avancement du projet pour qu'il soit de la forme xy%
			$xyz = round($avancement, 0, PHP_ROUND_HALF_ODD) . "%";
			// place le % d'avancement du projet dans $pourcentprogressbar avec comme id, l'id du projet
			$pourcentprogressbar[$elt->getId()] = $xyz;
		}

		// Passe toutes les variables nécessaires dans la vue

		$this->view->setVars(array("user"=>$user, "objects"=>$projets, "NbJourAvantFinProjet"=>$NbJourAvantFinProjet, "progressbar"=>$progressbar, "pourcentprogressbar"=>$pourcentprogressbar));		
	}

	

	public function projectAction(){

	}
}
