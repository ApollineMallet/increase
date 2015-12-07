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
}