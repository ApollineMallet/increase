<?php
use Ajax\bootstrap\html\html5\HtmlSelect;

class ConnexionController extends DefaultController{
	
	public function initialize(){
		parent::initialize();
	}
	
	/*private function javaToPhpSha($str){
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
	}*/
	
	public function indexAction($id=NULL) {
		
	}
	
	public function connexionAction() {
		
	}
}