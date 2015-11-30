<?php

class ProjectsController extends DefaultController{
	public function initialize(){
		parent::initialize();
		$this->model="Projet";
	}

	public function equipeAction($id=null){
		if($this->request->isAjax()){
			$user=User::find();
			$usecase=Usecase::find(array("idProjet=".$id));
			

			$PoidsDev = array();
			$IdDev = array();
			$NomDev = array();
			$color = array();
			
			$PoidTotal = 0;
			$colorDev = 0;

			foreach ($usecase as $uc) {
			$IdDev[$uc->getIdDev()] = $uc->getIdDev();
			$PoidTotal = $PoidTotal + $uc->getPoids();
			}
			
			foreach ($IdDev as $name){
				foreach ($user as $u){
					if ($name == $u->getId()){
						$NomDev[$u->getIdentite()] = $u->getIdentite();
						foreach ($usecase as $ucD){
							if ($ucD->getIdDev() == $u->getId()){
								$PoidsDev[$NomDev[$u->getIdentite()]] += $ucD->getPoids();
							}
						}
						$PoidsDev[$NomDev[$u->getIdentite()]] = floor(($PoidsDev[$NomDev[$u->getIdentite()]] / $PoidTotal) *100)."%";
						if ($colorDev == 0) {
							$color[$NomDev[$u->getIdentite()]] = "#E2ECFF";
							$colorDev = 1;
						}
						else {
							$color[$NomDev[$u->getIdentite()]] = "#A3C0FF";
							$colorDev = 0;
						}
					}
				}
			}
			
			
			$this->view->setVars(array("dev"=>$NomDev, "poid"=>$PoidsDev, "color"=>$color));

		}else{
			throw new Exception("404 not found", 1);
		}
	}
	
	public function messagesAction($id=null){
		$messageST=message::find("idProjet=".$id." and idFil is NULL");
		$user=User::find();
		
		$color = array();
		$emetteur = array();
			
		$colorDev = 0;
		$nbmsg = 0;
		
		$msgs=Message::find(array("idProjet=".$id));
		foreach ($msgs as $k){
			$nbmsg = $nbmsg + 1;
		}
		
		foreach ($messageST as $m){
			if ($colorDev == 0) {
				$color[$m->getId()] = "#E2ECFF";
				$colorDev = 1;
			}
			else {
				$color[$m->getId()] = "#A3C0FF";
				$colorDev = 0;
			}
		}
		
		foreach ($messageST as $M){
			foreach ($user as $U){
				if ($M->getIdUser() == $U->getId()){
				$emetteur[$M->getId()]= $U->getIdentite();
				}
			}
			
		}
		
		$this->view->setVars(array("msg"=>$messageST, "color"=>$color, "nbmsg"=>$nbmsg, "user"=>$emetteur));
	}
	
}


