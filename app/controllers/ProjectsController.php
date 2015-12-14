<?php
use Ajax\bootstrap\html\html5\HtmlSelect;
use Ajax\ui\Components\Progressbar;
class ProjectsController extends DefaultController {
	public function initialize() {
		parent::initialize ();
		$this->model = "Projet";
	}
	
	// ****************************************************************************************************************************//
	
	public function frmAction($id = NULL) {
		$projet = Projet::find ( "id=" . $id );
		$usecases = Usecase::find ();
		$users = User::find();
	
	
		$this->view->setVars ( array (
				"projet" => $projet,
				"siteUrl" => $this->url->getBaseUri (),
				"baseHref" => $this->dispatcher->getControllerName (),
				"usecases" => $usecases,
				"users" => $users
	
	
		) );
	
		parent::frmAction ( $id );
	}
	
	
	
	public function addAction($id = NULL) {
		$usecase = Usecase::findFirst ();
		$users= User::find();
		$projet= Projet::find();
		$today = "20" . date ( "y-m-d" );
	
	
	
		$this->view->setVars ( array (
				"projet" => $projet,
				"users" => $users,
				"siteUrl" => $this->url->getBaseUri (),
				"baseHref" => $this->dispatcher->getControllerName () ,
				"projet" =>$projet,
				"today" => $today,
				"code" =>$code
				
	
		) );
	
		parent::frmAction ( $id );
	}
	
	
	public function indexAction($message = NULL) {
		$msg = "";
		$show = "";
		
		$projets = Projet::find ();
		
	
		
		
		if (isset ( $message )) {
			if (is_string ( $message )) {
				$message = new DisplayedMessage ( $message );
			}
			$message->setTimerInterval ( $this->messageTimerInterval );
			$msg = $this->_showDisplayedMessage ( $message );
		}
		if ($this->model != "Usecase" & "Tache") {
				
			$show = "class='hidden'";
		} else {
			$show = "";
		}
	
		$objects = call_user_func ( $this->model . "::find" );
		
		//pb
		
		$today = date ( "Y-m-d" );
		// convertit la date d'aujourd'hui en secondes
		$debut_ts = strtotime ( $today );
		// instancie les arraylist utiles
		$NbJourAvantFinProjet = array ();
		$progressbar = array ();
		$pourcentprogressbar = array ();
		// Pour chaque projet du client
		foreach ( $projets as $elt ) {
			// convertit en secondes la date de fin de ce projet
			$fin_ts = strtotime ( $elt->getDateFinPrevue () );
			// calcul le nombre de secondes restantes jusqu'à la fin du projet
			$diff = $fin_ts - $debut_ts;
			// convertit en jour
			$nbjours = round ( $diff / 86400 );
			// place le nombre de jour restant dans l'arraylist $NbJourAvantFinProjet, avec comme id, l'id du projet
			$NbJourAvantFinProjet [$elt->getId ()] = $nbjours;
			// Sélectionne tous les usecases du projet
				
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
				// on incrémente $var du calcul çi-dessus
				$var = $var + $pourcentAvancement;
				// on incrémente $totalpoids du poids de la usecase
				$totalpoids = $totalpoids + $e->getPoids ();
			}
				
			// on calcul l'avancement du projet en %
			$avancement = $var / $totalpoids;
			// on calcul le tps total du projet en jour
			$TpsTotal = round ( (strtotime ( $elt->getDateFinPrevue () ) - strtotime ( $elt->getDateLancement () )) / 86400 );
			// on calcul l'avanceent du projet en % en terme de jours
			$cond = 100 - (($nbjours / $TpsTotal) * 100);
				
			// on attribu une couleur à la variable $couleur en fonction de
			// l'avancement en % du projet en terme de travail accompli comparé à l'avancement en % en terme de jours du projet passé
			if ($cond >= 100) {
				// si la date de fin de projet est dépassé
				$couleur = "danger";
			} elseif ($cond > $avancement) {
				// si l'avancement est inférieur au % de tps passé
				$couleur = "warning";
			} elseif ($cond <= $avancement) {
		
				// si l'avancement est supérieur au % de tps passé
				$couleur = "success";
			}
			// place la progressbar (avec comme id, l'id du projet) bootstrap dans l'arraylist $progressbar avec les variables calculées au dessus
			$progressbar [$elt->getId ()] = $this->jquery->bootstrap ()->htmlProgressbar ( "pb5", $couleur, floor ( $avancement ) )->setStriped ( true )->setActive ( true )->showcaption ( true );
		}
		
		
		
		
		$this->view->setVars ( array (
				"siteUrl" => $this->url->getBaseUri (),
				"baseHref" => $this->dispatcher->getControllerName (),
				"model" => $this->model,
				"msg" => $msg,
				"show" => $show,
				"user" => $user,
				"objects" => $projets,
				"NbJourAvantFinProjet" => $NbJourAvantFinProjet,
				"pb" => $progressbar,
		) );
		$this->jquery->getOnClick ( ".update, .add", "", "#content", array (
				"attr" => "data-ajax"
		) );
		$this->jquery->getOnClick ( ".delete", "", "#message", array (
				"attr" => "data-ajax"
		) );
		$this->jquery->compile ( $this->view );
		$this->view->pick ( "main/index" );
	}
		
		
		
	
	
	
	public function equipeAction($id = null) {
		if ($this->request->isAjax ()) {
			$user = User::find ();
			$usecase = Usecase::find ( array (
					"idProjet=" . $id 
			) );
			
			$PoidsDev = array ();
			$IdDev = array ();
			$NomDev = array ();
			$color = array ();
			
			$PoidTotal = 0;
			$colorDev = 0;
			
			foreach ( $usecase as $uc ) {
				$IdDev [$uc->getIdDev ()] = $uc->getIdDev ();
				$PoidTotal = $PoidTotal + $uc->getPoids ();
			}
			
			foreach ( $IdDev as $name ) {
				foreach ( $user as $u ) {
					if ($name == $u->getId ()) {
						$NomDev [$u->getIdentite ()] = $u->getIdentite ();
						foreach ( $usecase as $ucD ) {
							if ($ucD->getIdDev () == $u->getId ()) {
								$PoidsDev [$NomDev [$u->getIdentite ()]] += $ucD->getPoids ();
							}
						}
						$PoidsDev [$NomDev [$u->getIdentite ()]] = floor ( ($PoidsDev [$NomDev [$u->getIdentite ()]] / $PoidTotal) * 100 ) . "%";
						if ($colorDev == 0) {
							$color [$NomDev [$u->getIdentite ()]] = "#E2ECFF";
							$colorDev = 1;
						} else {
							$color [$NomDev [$u->getIdentite ()]] = "#A3C0FF";
							$colorDev = 0;
						}
					}
				}
			}
			
			$this->view->setVars ( array (
					"dev" => $NomDev,
					"poid" => $PoidsDev,
					"color" => $color 
			) );
		} else {
			throw new Exception ( "404 not found", 1 );
		}
	}
	// ****************************************************************************************************************************//
	public function messagesAction($id = null) {
		if ($this->request->isAjax ()) {
			$messageST = message::find ( "idProjet=" . $id . " and idFil is NULL" );
			$user = User::find ();
			
			$color = array ();
			$emetteur = array ();
			
			$colorDev = 0;
			$nbmsg = 0;
			
			$msgs = Message::find ( array (
					"idProjet=" . $id 
			) );
			foreach ( $msgs as $k ) {
				$nbmsg = $nbmsg + 1;
			}
			
			foreach ( $messageST as $m ) {
				if ($colorDev == 0) {
					$color [$m->getId ()] = "#E2ECFF";
					$colorDev = 1;
				} else {
					$color [$m->getId ()] = "#A3C0FF";
					$colorDev = 0;
				}
			}
			
			foreach ( $messageST as $M ) {
				foreach ( $user as $U ) {
					if ($M->getIdUser () == $U->getId ()) {
						$emetteur [$M->getId ()] = $U->getIdentite ();
					}
				}
			}
			
			
			$this->view->setVars ( array (
					"msg" => $messageST,
					"color" => $color,
					"nbmsg" => $nbmsg,
					"user" => $emetteur,
					"idpjt" => $id
			) );
			
			$this->jquery->getOnClick(".messagefil", "", "'#message'+$(self).attr('data-id')", array("attr"=>"data-ajax"));
			$this->jquery->getOnClick("#btnMess", "", "#newmessage", array("attr"=>"data-ajax"));
			
			$this->jquery->compile ( $this->view );
			$this->view->pick ( "projects/messages" );
		
		} else {
			throw new Exception ( "404 not found", 1 );
		}
	}
	// ****************************************************************************************************************************//
	public function messagefilAction($id = null) {
		if ($this->request->isAjax ()) {

			$contentmsg = Message::find ( "id=" . $id );
			$msgfil = Message::find ( "idFil=" . $id );
			$user = User::find ();
			
			$usermsg = array ();
			
			foreach ( $contentmsg as $cm ) {
				$content = $cm->getContent ();
				$idp = $cm->getIdProjet();
			}
			
			foreach ( $msgfil as $q ) {
				foreach ( $user as $u ) {
					if ($q->getIdUser () == $u->getId ()) {
						$usermsg [$q->getIdUser ()] = $u->getIdentite ();
					}
				}
			}
			
			$today = date ( "Y-m-d H:i:s" );
			
			$bt=$this->jquery->bootstrap()->htmlButton("btnValidate","Valider","btn_valider");
			$bt->postFormOnClick("Messages/update","frmMessage","#divMessages");
			

			
			$this->view->setVars ( array (
					"content" => $content,
					"user" => $usermsg,
					"msgfil" => $msgfil,
					"today" => $today,
					"idmsgparent" => $id,
					"idp" => $idp,
					"u" => $this->session->get("user")
			));
			
			$this->jquery->compile($this->view);
		} else {
			throw new Exception ( "404 not found", 1 );
		}
	}
}