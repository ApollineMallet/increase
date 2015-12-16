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
	
	public function updateAction() {}
	

	public function updatedroitAction() {
		$acls = Acl::find();
		$this->view->setVars(array("acls" => $acls));
		
		$ressources = Ressource::find();
		$this->view->setVars(array("ressources" => $ressources));
		

		/*$controllers = array(
				"Acl" => array(
						"name" => "Acl",
						"actions" => array(
								"index" => "Index",
								"update" => "Changer les rôles",
								"updaterole" => "Lister les utilisateurs et les rôles",
								"updatedroit" => "Lister les droits"

						)
				),
				"Connexion" => array(
						"name" => "Connexion",
						"actions" => array(
								"index" => "Acceder à la page d'authentification",
								"connexion" => "Se connecter",
								"deconnexion" => "Se deconnecter"
						)
				),
				"Default" => array(
						"name" => "Par defaut",
						"actions" => array(
								"_delete" => "_Supprimer",
								"delete" => "Supprimer",
								"frm" => "Modifier",
								"index" => "Lister",
								"update" => "Modifier/Ajouter",
						)
				),
				"Index" => array(
						"name" => "Index",
						"actions" => array(
								"index" => "Afficher l'accueil"
						)
				),
				"Messages" => array(
						"name" => "Message",
						"actions" => array(
								"newmessage"=>"Afficher formulaire d'ajout de message",
								"update" => "Modifier"
						)
				),
				"Projects"=>array(
						"name" => "Projet",
						"actions" => array(
								"add" => "Ajouter",
								"equipe" => "Afficher l'équipe",
								"index" => "Lister",
								"messagefil" =>"Afficher les sous-messages",
								"messages" => "Afficher les messages"
						)
				),
				"Taches" => array(
						"name" => "Tache",
						"actions" => array(
								"add" => "Ajouter",
								"frm" => "Modifier",
								"index" => "Lister",
								"show" => "Afficher",
								"update" => "Modifier"
						)
				),
				"UseCases" => array(
						"name" => "Use Cases",
						"actions" => array(
								"frm" => "Modifier",
								"index" => "Lister",
								"show" => "Afficher"
						)
				),
				"Users" => array(
						"name" => "Utilisateur",
						"actions" => array(
								"frm" => "Modifier",
								"project" => "Lister",
								"projects" => "Afficher un projet",
								"updaterole" => "Modifier le role"
						)
				)
		);
		
		$phql = "SELECT DISTINCT nom_ressource FROM Acl";
		$controllers = $this->modelsManager->executeQuery($phql);
		
		$this->view->setVars(array("controllers"=> $controllers,"siteUrl"=>$this->url->getBaseUri(),"baseHref"=>$this->dispatcher->getControllerName()));
		
		*/
	
		
	}
}