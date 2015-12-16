<?php
use Ajax\bootstrap\html\html5\HtmlSelect;
class UsersController extends DefaultController {
	public function initialize() {
		parent::initialize ();
		$this->model = "User";
	}
	public function frmAction($id = NULL) {
		$user = $this->getInstance ( $id );
		$select = new HtmlSelect ( "role", "Rôle", "Sélectionnez un rôle..." );
		$select->fromArray ( array (
				"admin",
				"user",
				"author" 
		) );
		$select->setValue ( $user->getRole () );
		$select->compile ( $this->jquery, $this->view );
		
		$this->view->setVars ( array (
				"user" => $user,
				"siteUrl" => $this->url->getBaseUri (),
				"baseHref" => $this->dispatcher->getControllerName () 
		) );
		parent::frmAction ( $id );
	}
	public function projectsAction($id = null) {
		

			$user = $this->session->get("user");

			if ($user->getRole() == 3) {
				$projets = Projet::find();
			}
			else {
				$projets = Projet::find ( array ("idClient=" . $user->getId () ) );
			}
			
			
			// date d'aujourd'hui
			$today = date ( "Y-m-d" );
			// convertit la date d'aujourd'hui en secondes
			$debut_ts = strtotime ( $today );
			// instancie les arraylist utiles
			$NbJourAvantFinProjet = array ();
			$progressbar = array ();
			$pourcentprogressbar = array ();
			$flagy = 0;
			// Pour chaque projet du client
			foreach ( $projets as $elt ) {
				$flagy = 1;
				// convertit en secondes la date de fin de ce projet
				$fin_ts = strtotime ( $elt->getDateFinPrevue () );
				// calcul le nombre de secondes restantes jusqu'Ã  la fin du projet
				$diff = $fin_ts - $debut_ts;
				// convertit en jour
				$nbjours = round ( $diff / 86400 );
				// place le nombre de jour restant dans l'arraylist $NbJourAvantFinProjet, avec comme id, l'id du projet
				$NbJourAvantFinProjet [$elt->getId ()] = $nbjours;
				// SÃ©lectionne tous les usecases du projet
				
				$usecase = usecase::find ( array (
						"idProjet=" . $elt->getId () 
				) );
				// instancie les variables
				$var = 0;
				$totalpoids = 0;
				// Pour chaque usecase du projet
				foreach ( $usecase as $e ) {
					// poid_de_la_usecase x avancement_de_la_usecase
					$pourcentAvancement = $e->getPoids () * $e->getAvancement ();
					// on incrÃ©mente $var du calcul Ã§i-dessus
					$var = $var + $pourcentAvancement;
					// on incrÃ©mente $totalpoids du poids de la usecase
					$totalpoids = $totalpoids + $e->getPoids ();
				}
				
				// on calcul l'avancement du projet en %
				$avancement = $var / $totalpoids;
				// on calcul le tps total du projet en jour
				$TpsTotal = round ( (strtotime ( $elt->getDateFinPrevue () ) - strtotime ( $elt->getDateLancement () )) / 86400 );
				// on calcul l'avanceent du projet en % en terme de jours
				$cond = 100 - (($nbjours / $TpsTotal) * 100);
				
				// on attribu une couleur Ã  la variable $couleur en fonction de
				// l'avancement en % du projet en terme de travail accompli comparÃ© Ã  l'avancement en % en terme de jours du projet passÃ©
				if ($cond >= 100) {
					// si la date de fin de projet est dÃ©passÃ©
					$couleur = "danger";
				} elseif ($cond > $avancement) {
					// si l'avancement est infÃ©rieur au % de tps passÃ©
					$couleur = "warning";
				} elseif ($cond <= $avancement) {
					
					// si l'avancement est supÃ©rieur au % de tps passÃ©
					$couleur = "success";
				}
				// place la progressbar (avec comme id, l'id du projet) bootstrap dans l'arraylist $progressbar avec les variables calculÃ©es au dessus
				$progressbar [$elt->getId ()] = $this->jquery->bootstrap ()->htmlProgressbar ( "pb5", $couleur, floor ( $avancement ) )->setStriped ( true )->setActive ( true )->showcaption ( true );
			}
			
			if ($flagy == 0) {
					$joke = "HAHAHA tu peux rien faire :D";
				}

			// Passe toutes les variables nÃ©cessaires dans la vue
			$this->view->setVars ( array (
					"user" => $user,
					"objects" => $projets,
					"NbJourAvantFinProjet" => $NbJourAvantFinProjet,
					"progressbar" => $progressbar,
					"siteUrl" => $this->url->getBaseUri (),
					"baseHref" => $this->dispatcher->getControllerName (),
					"joke" => $joke
			) );
			
			$this->jquery->getOnClick ( ".open", "", "#details", array (
					"attr" => "data-ajax" ,"jsCallback"=>$this->jquery->hide("#mainContent")
			) );
			$this->jquery->compile ( $this->view );
			$this->view->pick ( "users/projects" );
	
		
	}
	public function projectAction($id = null) {
		if ($this->request->isAjax ()) {
			
			$projet = call_user_func ( "Projet::find", array (
					"id=" . $id 
			) );
			foreach ( $projet as $pr ) {
				$user = $this->getInstance ( $pr->getIdClient () );
			}
			
			$nbmsg = 0;
			$msgs = Message::find ( array (
					"idProjet=" . $id 
			) );
			foreach ( $msgs as $k ) {
				$nbmsg = $nbmsg + 1;
			}
			
			$this->view->setVars ( array (
					"pro" => $projet,
					"user" => $user,
					"nbmsg" => $nbmsg,
					"siteUrl" => $this->url->getBaseUri (),
			) );
			
			$this->jquery->getOnClick ( "#equipe", "", "#detailProject", array (
					"attr" => "data-ajax" 
			) );
			$this->jquery->getOnClick ( "#btnMessages", "", "#divMessages", array (
					"attr" => "data-ajax" 
			) );
			$this->jquery->doJqueryOn("click","#btClose","#details","hide");
			$this->jquery->doJqueryOn("click","#btClose","#mainContent","show");
			$this->jquery->compile ( $this->view );
			$this->view->pick ( "users/project" );
		} else {
			throw new Exception ( "404 not found", 1 );
		}
		
	}
	
	public function updateroleAction () {
		if($this->request->isPost()){
			foreach (@$_POST["id"] as $id) {
				$object=$this->getInstance($id);
				if($id){
					try{
						$users = User::find("id=".$id);
						foreach ($users as $u){
							$u->setRole(@$_POST["role"]);
							$u->save();
						}
					}catch(\Exception $e){
						$msg=new DisplayedMessage("Impossible de mettre � jour le r�le !","danger");
					}
				}
			}
		}
		$this->response->redirect ('Acl/index');
	}
}