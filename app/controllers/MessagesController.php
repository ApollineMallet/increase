<?php
class MessagesController extends DefaultController {
	public function initialize() {
		parent::initialize ();
		$this->model = "Message";
	}
	
	public function newmessageAction($id = null){
		$today = date ( "Y-m-d H:i:s" );
		
		$this->view->setVars ( array (
				"today" => $today,
				"id" => $id,
				"user" => $this->session->get("user")
		));
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
					"nbmsg" => $nbmsg 
			) );
			
			$this->jquery->getOnClick ( "#equipe", "", "#detailProject", array (
					"attr" => "data-ajax" 
			) );
			$this->jquery->getOnClick ( "#btnMessages", "", "#divMessages", array (
					"attr" => "data-ajax" 
			) );
			$this->jquery->compile ( $this->view );
			
			$this->view->pick ( "users/project" );
		} else {
			throw new Exception ( "404 not found", 1 );
		}
	}
}