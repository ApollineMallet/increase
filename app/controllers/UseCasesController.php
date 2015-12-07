<?php
use Ajax\bootstrap\html\html5\HtmlSelect;
class UseCasesController extends DefaultController {
	public function initialize() {
		parent::initialize ();
		$this->model = "Usecase";
	}

	public function frmAction($id = NULL) {
		
		
		$usecase = Usecase::find ( array (
				"code='" . $id . "'" 
		) );
		$users = User::find ();
		
		$this->view->setVars ( array (
				"usecase" => $usecase,
				"users" => $users,
				"siteUrl" => $this->url->getBaseUri (),
				"baseHref" => $this->dispatcher->getControllerName (),
				
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
		$usecase = Usecase::findFirst ();
				$users= User::find();
				$projet= Projet::find();
				
		
	
				
		$this->view->setVars ( array (
				"usecase" => $usecase,
				"users" => $users,
				"siteUrl" => $this->url->getBaseUri (),
				"baseHref" => $this->dispatcher->getControllerName () ,
				"projet" =>$projet,
				"code" =>$code
				
		) );
		
		parent::frmAction ( $id );
	}


	
	}	
	
	




