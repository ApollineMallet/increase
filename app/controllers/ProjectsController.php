<?php
class ProjectsController extends DefaultController {
	public function initialize() {
		parent::initialize ();
		$this->model = "Projet";
	}
	public function equipeAction($id = null) {
		if ($this->request->isAjax ()) {
			$user = User::find ();
			$usecase = Usecase::find ( array (
					"idProjet=" . $id 
			) );
			
			$PoidsDev = array ();
			$IdDev = array ();
			$NomDev = array ();
			$color = array ();
			
			$PoidTotal = 0;
			$colorDev = 0;
			
			foreach ( $usecase as $uc ) {
				$IdDev [$uc->getIdDev ()] = $uc->getIdDev ();
				$PoidTotal = $PoidTotal + $uc->getPoids ();
			}
			
			foreach ( $IdDev as $name ) {
				foreach ( $user as $u ) {
					if ($name == $u->getId ()) {
						$NomDev [$u->getIdentite ()] = $u->getIdentite ();
						$usecaseDev = call_user_func ( "usecase::find", array (
								"idProjet=" . $id,
								"idDev=" . $NomDev [$u->getIdentite ()] 
						) );
						foreach ( $usecaseDev as $ucD ) {
							if ($ucD->getIdDev () == $u->getId ()) {
								$PoidsDev [$NomDev [$u->getIdentite ()]] += $ucD->getPoids ();
							}
						}
						$PoidsDev [$NomDev [$u->getIdentite ()]] = floor ( ($PoidsDev [$NomDev [$u->getIdentite ()]] / $PoidTotal) * 100 ) . "%";
						if ($colorDev == 0) {
							$color [$NomDev [$u->getIdentite ()]] = "#E2ECFF";
							$colorDev = 1;
						} else {
							$color [$NomDev [$u->getIdentite ()]] = "#A3C0FF";
							$colorDev = 0;
						}
					}
				}
			}
			
			$this->view->setVars ( array (
					"dev" => $NomDev,
					"poid" => $PoidsDev,
					"color" => $color 
			) );
		} else {
			throw new Exception ( "404 not found", 1 );
		}
	}
}


