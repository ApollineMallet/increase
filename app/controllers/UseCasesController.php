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
	public function showAction($id = NULL) {
		$usecase = Usecase::find ( array (
				"code='" . $id . "'" 
		) );
		$users = User::find ();
		
		foreach ( $usecase as $t ) {
			$avancement = $t->getAvancement ();
		}
		$pb = $this->jquery->bootstrap ()->htmlProgressbar ( "pb3", "info", $avancement )->setStriped ( true )->setActive ( true )->showcaption ( true );
		
		echo $pb->showcaption ( true );
		$this->view->setVars ( array (
				"usecase" => $usecase,
				"users" => $users,
				"siteUrl" => $this->url->getBaseUri (),
				"baseHref" => $this->dispatcher->getControllerName (),
				"avancement" => $avancement,
				"pb" => $pb 
		) );
		
		parent::frmAction ( $id );
	}
	public function addAction($id = NULL) {
		$usecase = Usecase::find ( array (
				"code='" . $id . "'" 
		) );
		$taches= Tache::find();
	
		$avancement = "";
		$variable = 0;
		
		foreach ( $tache as $ta ) {
			$avancement += $ta->getAvancement ();
		
			$variable += 1;
		}
		$result = $avancement / $variable;
		
		$users = User::find ();
		
		$this->view->setVars ( array (
				"usecase" => $usecase,
				"users" => $users,
				"siteUrl" => $this->url->getBaseUri (),
				"baseHref" => $this->dispatcher->getControllerName () 
		) );
		
		parent::frmAction ( $id );
	}
}