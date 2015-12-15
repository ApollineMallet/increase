<?php
use Phalcon\Mvc\View;
class IndexController extends ControllerBase {
	public function initialize() {
		if ($this->request->isAjax ()) {
			$this->view->setRenderLevel ( View::LEVEL_ACTION_VIEW );
		}
	}
	public function indexAction() {
		
		if ($this->session->get("user")) {
			
			$this->jquery->getOnClick ( "a.tool", "", "#content", array ("attr" => "data-ajax" ) );
			$this->jquery->compile ( $this->view );
			$this->view->setVars ( array ("user" => $this->session->get ( "user", "" ),) );
		}
		else
		{
			$this->dispatcher->forward ( array (
					"controller" => "connexion",
					"action" => "index",
					"params" => array (
							$msg 
					) 
			) );
		}

	}
	
	
	
	
	
}

