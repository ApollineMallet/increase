<?php
class MessagesController extends DefaultController {
	public function initialize() {
		parent::initialize ();
		$this->model = "Message";
	}
	
	public function newmessageAction($id = null){
		$today = date ( "Y-m-d H:i:s" );
		
		$this->view->setVars ( array (
				"today" => $today,
				"id" => $id,
				"user" => $this->session->get("user")
		));
	}
	
	public function updateAction() {
		if ($this->request->isPost ()) {
			$object = $this->getInstance ( @$_POST ["id"] );
			$this->setValuesToObject ( $object );
			if ($_POST ["idProjet"]) {
				try {
					$object->save ();
					$this->jquery->getOnClick("#btnValidate", "/projects/messagefil/".$object->getIdFil(), ".message".$object->getIdFil());
					

				} catch ( \Exception $e ) {
					$msg = new DisplayedMessage ( "Impossible de modifier l'instance de " . $this->model, "danger" );
				}
			}
		}
	}
	
}