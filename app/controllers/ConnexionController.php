<?php
use Ajax\bootstrap\html\html5\HtmlSelect;

class ConnexionController extends DefaultController{
	
	public function initialize(){
		parent::initialize();
	}
	
	private function javaToPhpSha($str){
		$k=hash("sha256", $str,true);
		$hex_array = array();
		foreach (str_split($k) as $chr) {
			$o=ord($chr);
			if($o>127)
				$o=$o-256;
			elseif ($o<-127)
				$o=$o+256;
				$hex_array[] = sprintf("%02x", $o);
		}
		$key=implode('',$hex_array);
		return $key;
	}
	
	public function indexAction($id=NULL) {
		
	}
	
	public function connexionAction() {
		$mail = $_POST['mail'];
		$mdp = $_POST['mdp'];
		$user=User::findFirst("mail='".$mail."'");
		
		$password = $this->javaToPhpSha($mdp);
		$userPass = $user->getPassword();
		
		if($userPass == $password) {
			$this->session->set("user",$user);
		}
		
		$this->response->redirect('index/index');
		
	}
	
	public function deconnexionAction() {
		$this->session->destroy();
		$this->dispatcher->forward(array("controller"=>"index", "action"=>"index"));
	}
	
	
	
}