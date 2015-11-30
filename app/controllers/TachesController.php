<?php
use Ajax\bootstrap\html\html5\HtmlSelect;
class TachesController extends DefaultController {
	public function initialize() {
		parent::initialize ();
		
		$this->model = "Tache";
	}
	public function frmAction($id = NULL) {
		$taches = call_user_func ( $this->model . "::find", array (
				"id=" . $id 
		) );
		// $taches=$this->getInstance($id);
		
		$this->view->setVars ( array (
				"taches" => $taches,
				"siteUrl" => $this->url->getBaseUri (),
				"baseHref" => $this->dispatcher->getControllerName () 
		) );
		
		parent::frmAction ( $id );
	}
	public function showAction($id = NULL) {
		if ($this->request->isAjax ()) {
			$user = user::find ();
			$taches = call_user_func ( $this->model . "::find", array (
					"id=" . $id 
			) );
			
			$PoidsDev = array ();
			$IdDev = array ();
			$NomDev = array ();
			$color = array ();
			
			$PoidTotal = 0;
			$colorDev = 0;
			
			foreach ( $taches as $ta ) {
				$IdDev [$ta->getIdDev ()] = $ta->getIdDev ();
				$PoidTotal = $PoidTotal + $ta->getPoids ();
			}
			
			foreach ( $IdDev as $name ) {
				foreach ( $taches as $t ) {
					if ($name == $t->getId ()) {
						$NomDev [$t->getIdentite ()] = $t->getIdentite ();
						$usecaseDev = call_user_func ( "usecase::find", array (
								"idProjet=" . $id,
								"idDev=" . $NomDev [$t->getIdentite ()] 
						) );
						foreach ( $usecaseDev as $ucD ) {
							if ($ucD->getIdDev () == $t->getId ()) {
								$PoidsDev [$NomDev [$t->getIdentite ()]] += $ucD->getPoids ();
							}
						}
						$PoidsDev [$NomDev [$t->getIdentite ()]] = floor ( ($PoidsDev [$NomDev [$t->getIdentite ()]] / $PoidTotal) * 100 ) . "%";
						if ($colorDev == 0) {
							$color [$NomDev [$t->getIdentite ()]] = "#E2ECFF";
							$colorDev = 1;
						} else {
							$color [$NomDev [$t->getIdentite ()]] = "#A3C0FF";
							$colorDev = 0;
						}
					}
				}
			}
			
			$this->view->setVars ( array (
					"taches" => $taches,
					"siteUrl" => $this->url->getBaseUri (),
					"baseHref" => $this->dispatcher->getControllerName (),
					"dev" => $NomDev,
					"poid" => $PoidsDev,
					"color" => $color 
			) );
		} else {
			throw new Exception ( "404 not found", 1 );
		}
		
		parent::frmAction ( $id );
	}
	public function addAction($id = NULL) {
		$taches = call_user_func ( $this->model . "::find" );
		
		$this->view->setVars ( array (
				"taches" => $taches,
				"siteUrl" => $this->url->getBaseUri (),
				"baseHref" => $this->dispatcher->getControllerName () 
		) );
		
		parent::frmAction ( $id );
	}
}

