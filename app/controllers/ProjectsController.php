<?php
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