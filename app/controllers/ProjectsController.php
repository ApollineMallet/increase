<?php

class ProjectsController extends DefaultController{
	public function initialize(){
		parent::initialize();
		$this->model="Projet";
	}

	public function equipeAction($id=null){
		if($this->request->isAjax()){

			$usecase=call_user_func("usecase::find",array("idProjet=".$id));
			$user=call_user_func("user::find");

			$developpeur = array();
			$dev = array();

			foreach ($usecase as $y) {
				$dev[$y->getIdDev()] = $y->getIdDev();
				$developpeur[$y->getIdDev][1] = $developpeur[$y->getIdDev][1] + $y->getPoids();
			}

			foreach ($dev as $u) {
				foreach ($user as $s) {
					if ($s->getId() == $u) {
						$developpeur[$u][0] = $s->getIdentite();
					}
				}
			}

			$this->view->setVars(array("dev"=>$developpeur));

		}else{
			throw new Exception("404 not found", 1);
		}
	}
	
	
}

