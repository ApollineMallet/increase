<?php
class MessagesController extends DefaultController{
	public function initialize(){
		parent::initialize();
		$this->model="Message";
	}
	
	
	public function messagefilAction($id = NULL) {
		$message = Message::findFirst ();
	
		
	
		$this->view->setVars ( array (
				"message" => $message,
				"siteUrl" => $this->url->getBaseUri (),
				"baseHref" => $this->dispatcher->getControllerName (),
				
		) );
	
		parent::frmAction ( $id );
	}
	}
	
	
	
