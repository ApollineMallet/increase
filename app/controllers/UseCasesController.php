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
				
				"siteUrl" => $this->url->getBaseUri (),
				"baseHref" => $this->dispatcher->getControllerName (),
				"users" => $users
				
		) );
		
		parent::frmAction ( $id );
	}
	
	

	public function showAction($id = NULL) {
		$usecase = Usecase::find ( array (
				"code='" . $id . "'" 
		) );
		$user = User::findFirst ( "mail='" . $mail . "'" );
		
		
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
				"pb" => $pb,
				"user" => $this->session->get ( "user", "" ),
		) );
		
		parent::frmAction ( $id );
	}
	
	

	
	public function indexAction($message = NULL) {
		
		$msg = "";
		$show = "";
		
		$usecase = Usecase::find ();
		
		
		if ($this->session->get("user")->getRole() != 1) {
		if (isset ( $message )) {
			if (is_string ( $message )) {
				$message = new DisplayedMessage ( $message );
			}
			$message->setTimerInterval ( $this->messageTimerInterval );
			$msg = $this->_showDisplayedMessage ( $message );
		}
		if ($this->model != "Usecase" & "Tache") {
				
			$show = "class='hidden'";
		} else {
			$show = "";
		}
	
		$pb=array();
		
		foreach ( $usecase as $t ) {
			$avancement = $t->getAvancement ();
			$pb[$t->getId()] = $this->jquery->bootstrap ()->htmlProgressbar ( "pb3", "info", $avancement )->setStriped ( true )->setActive ( true )->showcaption ( true );
			
		}
			
		$objects = call_user_func ( $this->model . "::find" );
		$this->view->setVars ( array (
				
				"siteUrl" => $this->url->getBaseUri (),
				"baseHref" => $this->dispatcher->getControllerName (),
				"model" => $this->model,
				"msg" => $msg,
				"show" => $show,
				"pb" =>$pb,
				"objects" => $usecase,
				"user" => $this->session->get ("user"),	
		) );
		
		$this->jquery->getOnClick ( ".update, .add", "", "#content", array (
				"attr" => "data-ajax"
		) );
		$this->jquery->getOnClick ( ".delete", "", "#message", array (
				"attr" => "data-ajax"
		) );
		$this->jquery->compile ( $this->view );
		$this->view->pick ( "main/index" );
		
	}
	
	}
	
	
	}	
	
	




