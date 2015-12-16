<?php

class AclController extends DefaultController{

	public function initialize(){
		parent::initialize();
		$this->model="Acl";
	}
	
	

	public function indexAction($message = null) {
		$this->jquery->getOnClick("#updaterole", "", "#update", array("attr"=>"data-ajax"));
		$this->jquery->getOnClick("#updatedroit", "", "#update", array("attr"=>"data-ajax"));
		$this->jquery->compile($this->view);
		$this->view->pick("acl/index");
		$this->view->setVars ( array ("user" => $this->session->get ( "user")) );
	}
	
	public function updateroleAction () {
		$utils = User::find("role = 1");
		$this->view->setVars(array("utils" => $utils));
		
		$authors = User::find("role = 2");
		$this->view->setVars(array("authors" => $authors));
		
		$admins = User::find("role = 3");
		$this->view->setVars(array("admins" => $admins));
		
		$roles = Role::find();
		$this->view->setVars(array("roles" => $roles));
		
		$this->jquery->change("[type=checkbox]","$('#formrole').show();");
		
		$this->jquery->compile($this->view);
		$this->view->pick("Acl/updaterole");	
	}
	
	public function updateAction() {
		if ($this->request->isPost ()) {
			$objects = $this->getInstance ( @$_POST ["id"] );
			foreach ($objects as $object) {
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
		
				$this->dispatcher->forward ( array (
						"controller" => $this->dispatcher->getControllerName (),
						"action" => "index",
						"params" => array (
								$msg
						) ,
						"user" => $this->session->get("user")
				) );
			}
		}
	}
	
	protected function setValuesToObject(&$objects) {
		$objects->assign ( $_POST );
	}
	
	public function getInstance($id = NULL) {
		foreach($objects as $object) {
			if (isset ( $id )) {
				$this->model= 'User';
				$object = call_user_func ( $this->model . "::findfirst", $id );
			} else {
				$className = 'User';
				$object = new $className ();
			}
			return $object;
		}
	}
	
	
	public function updatedroitAction() {}
}