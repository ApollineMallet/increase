<?php

class AclController extends DefaultController{

	public function initialize(){
		parent::initialize();
	}

	public function indexAction($message = null) {
		$this->jquery->getOnClick("#updaterole", "", "#update", array("attr"=>"data-ajax"));
		$this->jquery->getOnClick("#updatedroit", "", "#update", array("attr"=>"data-ajax"));
		$this->jquery->compile($this->view);
		$this->view->pick("acl/index");
	}
	
	public function updateroleAction () {
		$users = User::find();
		$this->view->setVars(array("users" => $users));
		
		$roles = Role::find();
		$this->view->setVars(array("roles" => $roles));		
	}
	
	public function updatedroitAction() {}
}