<?php

use Ajax\bootstrap\html\html5\HtmlSelect;
class TachesController extends DefaultController{
	public function initialize(){
		parent::initialize();
		
		$this->model="Tache";
		
		
	}

	public function frmAction($id=NULL){
		
		$taches=call_user_func($this->model."::find", array("id=".$id));
		//$taches=$this->getInstance($id);

		$this->view->setVars(array("taches"=>$taches,"siteUrl"=>$this->url->getBaseUri(), "baseHref"=>$this->dispatcher->getControllerName()));
		
		parent::frmAction($id);
		
	}
	
	
	public function addAction($id=NULL){
	
		$taches=call_user_func($this->model."::find");
		//$taches=$this->getInstance($id);
		
		$this->view->setVars(array("taches"=>$taches,"siteUrl"=>$this->url->getBaseUri(), "baseHref"=>$this->dispatcher->getControllerName()));
	
		parent::frmAction($id);
	
	}
	
}

