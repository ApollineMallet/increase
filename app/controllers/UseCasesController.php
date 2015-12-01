<?php
class UseCasesController extends DefaultController {
	public function initialize() {
		parent::initialize ();
		$this->model = "Usecase";
	}
	public function frmAction($id = NULL) {
		$usecases = Usecase::find ( array (
				"code='" . $id . "'" 
		) );
		
		$this->view->setVars ( array (
				"usecase" => $usecases,
				"siteUrl" => $this->url->getBaseUri (),
				"baseHref" => $this->dispatcher->getControllerName () 
		) );
		
		parent::frmAction ( $id );
	}
	public function addAction($id = NULL) {
		$code = "";
		
		$usecases = Usecase::find ( array (
				"code='" . $id . "'" 
		) );
		
		$this->view->setVars ( array (
				"usecase" => $usecases,
				"siteUrl" => $this->url->getBaseUri (),
				"baseHref" => $this->dispatcher->getControllerName () 
		) );
		
		parent::frmAction ( $id );
	}
}