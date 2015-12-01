<?php
use Ajax\bootstrap\html\html5\HtmlSelect;
class UseCasesController extends DefaultController {
	public function initialize() {
		parent::initialize ();
		$this->model = "Usecase";
	}
	public function getInstance($id = NULL) {
		if (isset ( $id )) {
			$object = Usecase::findfirst ( "code='" . $id . "'" );
		} else {
			$object = new Usecase ();
		}
		return $object;
	}
	public function frmAction($id = NULL) {
		$buttonsGroup = $this->jquery->bootstrap ()->htmlButtongroups ( 'bg-users' );
		echo $buttonsGroup->fromDatabaseObjects ( $users, function ($users) {
			return new Ajax\bootstrap\html\HtmlButton ( $users->getId (), $users->getIdentite () );
		} );
		
		$usecase = Usecase::find ( array (
				"code='" . $id . "'" 
		) );
		$users = User::find ();
		
		$this->view->setVars ( array (
				"usecase" => $usecase,
				"users" => $users,
				"siteUrl" => $this->url->getBaseUri (),
				"baseHref" => $this->dispatcher->getControllerName (),
				"buttonUser" => $buttonsGroup 
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