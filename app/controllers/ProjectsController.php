<?php

class ProjectsController extends DefaultController{
	public function initialize(){
		parent::initialize();
		$this->model="Projet";
	}

	public function equipeAction($id=null){
		echo $id;
	}
	
	
}

