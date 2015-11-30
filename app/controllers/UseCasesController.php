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
		$user = $this->getInstance ( $id );
		
		$this->view->setVars ( array (
				"usecase" => $usecases,
				"siteUrl" => $this->url->getBaseUri (),
				"baseHref" => $this->dispatcher->getControllerName (),
				"user" => $users,
				"users" => $user 
		) );
		
		parent::frmAction ( $id );
	}
}