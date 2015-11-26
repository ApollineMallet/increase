<?php
use Ajax\bootstrap\html\html5\HtmlSelect;
class UsersController extends DefaultController{
	public function initialize(){
		parent::initialize();
		$this->model="User";
	}
	public function frmAction($id=NULL){
		$user=$this->getInstance($id);
		
		
		$this->view->setVars(array("user"=>$user,"siteUrl"=>$this->url->getBaseUri(),"baseHref"=>$this->dispatcher->getControllerName()));
		parent::frmAction($id);
	}
	

	public function projectsAction($id=null){
		$user=$this->getInstance($id);
		$objects=call_user_func("Projet::find",array("idClient=".$user->getId()));
		$this->view->setVars(array("user"=>$user, "objects"=>$objects));

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
			$cond = 100-(($nbjours / $TpsTotal)*100);

			// on attribu une couleur à la variable $couleur en fonction de 
			// l'avancement en % du projet en terme de travail accompli comparé à l'avancement en % en terme de jours du projet passé
			if ($cond >= 100){
				// si la date de fin de projet est dépassé
				$couleur = "danger";
			}
			elseif ($cond > $avancement){
				// si l'avancement est inférieur au % de tps passé
				$couleur = "warning";
			}
			elseif ($cond <= $avancement){
				
				// si l'avancement est supérieur au % de tps passé
				$couleur = "success";
			}
			// place la progressbar (avec comme id, l'id du projet) bootstrap dans l'arraylist $progressbar avec les variables calculées au dessus
			$progressbar[$elt->getId()] = $this->jquery->bootstrap()->htmlProgressbar("pb5",$couleur,floor($avancement))->setStriped(true)->setActive(true)->showcaption(true);
			
		}
		
		// Passe toutes les variables nécessaires dans la vue
		$this->view->setVars(array("user"=>$user, "objects"=>$projets, "NbJourAvantFinProjet"=>$NbJourAvantFinProjet, "progressbar"=>$progressbar,"siteUrl"=>$this->url->getBaseUri(),"baseHref"=>$this->dispatcher->getControllerName()));		


    
    	$this->jquery->getOnClick(".open","","#content",array("attr"=>"data-ajax"));
    	$this->jquery->compile($this->view);
    	$this->view->pick("users/projects");

	}
	

	public function projectAction($id=null){
		$projet=call_user_func("Projet::find",array("id=".$id));
		foreach ($projet as  $pr) {
			$user=$this->getInstance($pr->getIdClient());
		}
		$this->view->setVars(array("pro"=>$projet, "user"=>$user));

		$this->jquery->getOnClick("#equipe","","#detailProject",array("attr"=>"data-ajax"));
		$this->jquery->compile($this->view);
    	$this->view->pick("users/project");
	}
}

