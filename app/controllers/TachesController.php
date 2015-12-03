<?php
use Ajax\bootstrap\html\html5\HtmlSelect;
class TachesController extends DefaultController {
	public function initialize() {
		parent::initialize ();
		
		$this->model = "Tache";
	}
	public function frmAction($id = NULL) {
		$tache = Tache::find ( "id=" . $id );
		$usecases = Usecase::find ();
		$avancementUC = "";
		$avancementT = "";
		$variable = 0;
			
		foreach ( $tache as $ta ) {
				
		$avancementT += $ta->getAvancement();

		}
		foreach ($usecases as $uc){
		$variable += 1;
		$avancementUC = $avancementTA / $variable;
		
		}
		
		$this->view->setVars ( array (
		"tache" => $tache,
		"usecases" => $usecases,
		"siteUrl" => $this->url->getBaseUri (),
		"baseHref" => $this->dispatcher->getControllerName (),
		"usecases" => $usecases,
		"avancementUC" =>$avancementUC,
		"variable" =>$variable
		
		) );
		
		
		parent::frmAction ( $id );
	}
	public function showAction($id = NULL) {
		$tache = Tache::find ( "id=" . $id );
		$usecases = Usecase::find ();
		foreach ( $tache as $t ) {
			
			$avancement = $t->getAvancement ();
		}
		$pb = $this->jquery->bootstrap ()->htmlProgressbar ( "pb3", "info", $avancement )->setStriped ( true )->setActive ( true )->showcaption ( true );
		
		echo $pb->showcaption ( true );
		
		$this->view->setVars ( array (
				"tache" => $tache,
				"usecases" => $usecases,
				"siteUrl" => $this->url->getBaseUri (),
				"baseHref" => $this->dispatcher->getControllerName (),
				"dev" => $NomDev,
				"poid" => $PoidsDev,
				"color" => $color,
				"pb" => $pb 
		) );
		
		parent::frmAction ( $id );
	}
	public function addAction($id = NULL) {
		$tache = Tache::findFirst ();
		$today = "20" . date ( "y-m-d" );
		$usecases = Usecase::find ();
		
		$this->view->setVars ( array (
				"tache" => $tache,
				"siteUrl" => $this->url->getBaseUri (),
				"baseHref" => $this->dispatcher->getControllerName (),
				"poid" => $PoidTotal,
				"today" => $today,
				"usecases" => $usecases 
		) );
		
		parent::frmAction ( $id );
	}
}

