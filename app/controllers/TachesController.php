<?php

use Ajax\bootstrap\html\html5\HtmlSelect;
class TachesController extends DefaultController{
	public function initialize(){
		parent::initialize();
		
		$this->model="Tache";
		
		

	
	}

	public function frmAction($id=NULL){
		$objects=call_user_func($this->model."::find");
		
// 		foreach ($taches as $tache){
// 			$usecase=call_user_func("tache::find",array("id=".$tache->getUsecase()));
			
// 		}
		
		$this->view->setVars(array("tache"=>$taches, "baseHref"=>$this->dispatcher->getControllerName()));
		
	
		parent::frmAction($id);
		
	}
	
	
}

