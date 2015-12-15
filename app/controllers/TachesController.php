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

		
		$this->view->setVars ( array (
		"tache" => $tache,
		"siteUrl" => $this->url->getBaseUri (),
		"baseHref" => $this->dispatcher->getControllerName (),
		"usecases" => $usecases,
		

		) );

		parent::frmAction ( $id );
	}
	
	
	public function indexAction($message = NULL) {
	
	
	
		$msg = "";
		$show = "";
	
		$tache = Tache::find ();
		$users = User::find ();
		if (isset ( $message )) {
			if (is_string ( $message )) {
				$message = new DisplayedMessage ( $message );
			}
			$message->setTimerInterval ( $this->messageTimerInterval );
			$msg = $this->_showDisplayedMessage ( $message );
		}
		if ($this->model != "Usecase" & "Tache") {
	
			$show = "class='hidden'";
		} else {
			$show = "";
		}
	
		$pb=array();
	
		foreach ( $tache as $t ) {
			$avancement = $t->getAvancement ();
			$pb[$t->getId()] = $this->jquery->bootstrap ()->htmlProgressbar ( "pb3", "info", $avancement )->setStriped ( true )->setActive ( true )->showcaption ( true );
				
		}
			
	
		$objects = call_user_func ( $this->model . "::find" );
		$this->view->setVars ( array (
				"objects" => $objects,
				"siteUrl" => $this->url->getBaseUri (),
				"baseHref" => $this->dispatcher->getControllerName (),
				"model" => $this->model,
				"msg" => $msg,
				"show" => $show,
				"pb" =>$pb,
				"objects" => $tache,
				"user" => $users
		) );
		$this->jquery->getOnClick ( ".update, .add", "", "#content", array (
				"attr" => "data-ajax"
		) );
		$this->jquery->getOnClick ( ".delete", "", "#message", array (
				"attr" => "data-ajax"
		) );
		$this->jquery->compile ( $this->view );
		$this->view->pick ( "main/index" );
	}
	
	
	
	public function showAction($id = NULL) {
		
		
		$tache = Tache::find ( "id=" . $id );
		$usecases = Usecase::find ();
		$user = User::findFirst ( "mail='" . $mail . "'" );
		$this->view->setVars ( array (
				"user" => $this->session->get ( "user", "" ),
		
		) );
		
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
				"pb" => $pb,
				
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
				"today" => $today,
				"usecases" => $usecases 
		) );
		
		parent::frmAction ( $id );
	}
	public function updateAction() {
		if ($this->request->isPost ()) {
			$object = $this->getInstance ( @$_POST ["id"] );
			$this->setValuesToObject ( $object );
			if ($_POST ["id"]) {
				try {
					$object->save ();
					$msg = new DisplayedMessage ( $this->model . " `{$object->toString()}` mis à jour" );
				} catch ( \Exception $e ) {
					$msg = new DisplayedMessage ( "Impossible de modifier l'instance de " . $this->model, "danger" );
				}
			} else {
				try {
					$object->save ();
					$msg = new DisplayedMessage ( "Instance de " . $this->model . " `{$object->toString()}` ajoutée" );
				} catch ( \Exception $e ) {
					$msg = new DisplayedMessage ( "Impossible d'ajouter l'instance de " . $this->model, "danger" );
				}
			}
				
			try {
				$avancement = 0;
				$usecase = Usecase::findFirst("code='".$object->getCodeUseCase()."'");
				$taches = Tache::find("codeUseCase LIKE '".$object->getCodeUseCase()."'");
				foreach ($taches as $tache){
					$avancement += $tache->getAvancement();
				}
				$avancement = $avancement/count($taches);
				$usecase->setAvancement($avancement);
				$usecase->save();
			}catch (\Exception $e){
				$msg=new DisplayedMessage("Impossible de modifier l'avancement de la  UseCase ".$usecase,"danger");
			}
				
			$this->dispatcher->forward ( array (
					"controller" => $this->dispatcher->getControllerName (),
					"action" => "index",
					"params" => array (
							$msg
					)
			) );
		}
	}
}

