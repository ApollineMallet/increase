<?php


use Ajax\bootstrap\html\html5\HtmlSelect;
class UsersController extends DefaultController{
	public function initialize(){
		parent::initialize();
		$this->model="User";
	}

	public function frmAction($id=NULL){
		$user=$this->getInstance($id);
		$select=new HtmlSelect("role","Rôle","Sélectionnez un rôle...");
		$select->fromArray(array("admin","user","author"));
		$select->setValue($user->getRole());
		$select->compile($this->jquery,$this->view);
		$this->view->setVars(array("user"=>$user,"siteUrl"=>$this->url->getBaseUri(),"baseHref"=>$this->dispatcher->getControllerName()));
		parent::frmAction($id);
	}
	


	public function projectsAction($id=null){
		$user=$this->getInstance($id);
		$objects=call_user_func("Projet::find",array("idClient=".$user->getId()));

		$today = "20" . date("y-m-d");
		$debut_ts = strtotime($today);
		$nbSecondes= 60*60*24;
		$NbJourAvantFinProjet = array();
		$flag = 0;
		foreach ($objects as $elt) {
			$fin_ts = strtotime($elt->getDateFinPrevue());
			$diff = $fin_ts - $debut_ts;
			$nbjours = round($diff / $nbSecondes );
			$NbJourAvantFinProjet[$flag] = $nbjours;
			$flag = $flag + 1;
		}




		$this->view->setVars(array("user"=>$user, "objects"=>$objects, "NbJourAvantFinProjet"=>$NbJourAvantFinProjet));		
	}

	

	public function projectAction(){

	}
}