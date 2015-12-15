<?php
use Phalcon\Mvc\Controller;
class ControllerBase extends Controller {
	// a remettre pour obliger la connexion
	
	  public function initialize(){
	  if(!$this->session->has("user")){
	  $this->dispatcher->forward(array("controller"=>"connexion","action"=>"index"));
	  }
	  
		 }
	 
}
