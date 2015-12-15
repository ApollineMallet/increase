<?php
use Ajax\bootstrap\html\html5\HtmlSelect;
use Phalcon\Mvc\View;
class ConnexionController extends DefaultController {
	public function initialize() {
		parent::initialize ();
	}
	private function javaToPhpSha($str) {
		$k = hash ( "sha256", $str, true );
		$hex_array = array ();
		foreach ( str_split ( $k ) as $chr ) {
			$o = ord ( $chr );
			if ($o > 127)
				$o = $o - 256;
			elseif ($o < - 127)
				$o = $o + 256;
			$hex_array [] = sprintf ( "%02x", $o );
		}
		$key = implode ( '', $hex_array );
		return $key;
	}
	public function indexAction($msg = NULL) {
		$user = User::findFirst ( "mail='" . $mail . "'" );
		if (isset ( $msg )) {
			$this->view->setVars ( array (
					"msg" => $msg->compile ( $this->jquery ),
					
			) );
		} else {
			
			$this->view->setVars ( array (
					"msg" => "",
					"user" => $user
			) );
		}
		
	}
	public function connexionAction($msg = null) {
		$mail = $_POST ['mail'];
		$mdp = $_POST ['mdp'];
		$user = User::findFirst ( "mail='" . $mail . "'" );
			
		if ($user != null) {
			$password = $this->javaToPhpSha ( $mdp );
			$userPass = $user->getPassword ();
			
			if ($userPass == $password) {
				$this->session->set ( "user", $user );
				$this->response->redirect ( 'index' );
			} else {
				$msg = new DisplayedMessage ( "Il y a une erreur dans votre mail ou votre mot de passe.", "danger" );
				$this->dispatcher->forward ( array (
						"controller" => "connexion",
						"action" => "index",
						"params" => array (
								$msg 
						) 
				) );
			}
		} else {
			$msg = new DisplayedMessage ( "Il y a une erreur dans votre mail ou votre mot de passe.", "danger" );
			$this->dispatcher->forward ( array (
					"controller" => "connexion",
					"action" => "index",
					"params" => array (
							$msg 
					) 
			) );
	
		}
	}
	public function deconnexionAction() {
	

		$this->view->setRenderLevel ( View::LEVEL_ACTION_VIEW );

		$this->session->destroy ();

		$this->response->redirect ( "index" );
	}
}