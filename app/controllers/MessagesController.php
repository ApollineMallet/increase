<?php
class MessagesController extends DefaultController {
	public function initialize() {
		parent::initialize ();
		$this->model = "Message";
	}
	
	public function newmessageAction($id = null){
		if ($this->request->isAjax ()) {
			$today = date ( "Y-m-d H:i:s" );
			
			$this->view->setVars ( array (
					"today" => $today,
					"id" => $id,
					"user" => $this->session->get("user")
			));

			$bt=$this->jquery->bootstrap()->htmlButton("btnValidate","Valider","btn_valider");
			$bt->postFormOnClick("Messages/update","frmMessage","#divMessages");
			$this->jquery->compile($this->view);
		} else {
			throw new Exception ( "404 not found", 1 );
		}
	}
	

	public function updateAction($id=null) {

		if ($this->request->isPost ()) {
			$object = $this->getInstance ( @$_POST ["id"] );
			$this->setValuesToObject ( $object );
			if ($_POST ["idProjet"]) {
				try {
					$object->save ();
					$this->dispatcher->forward(array(
	                "controller" => "projects",
	                "action"     => "messages",
	                "params"	 => array($_POST ["idProjet"])
	            	));

				} catch ( \Exception $e ) {
					$msg = new DisplayedMessage ( "Impossible de modifier l'instance de " . $this->model, "danger" );
				}
			}
		}
	}
	

}