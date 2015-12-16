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
	
	public function modifroleAction () {
		$role = $_POST["role"];
		$utilisateurs = $_POST["utilisateur"];
	
		if ($role == "user") {
			$idRole = '1';
		}
		else if ($role == "author") {
			$idRole = '2';
		}
		else if ($role == "admin") {
			$idRole = '3';
		}
	
			
	
		
		
	
	}
	
	public function updatedroitAction() {}
}