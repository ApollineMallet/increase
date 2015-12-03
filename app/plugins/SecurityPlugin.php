<?php

use Phalcon\Acl;
use Phalcon\Acl\Role;
use Phalcon\Acl\Resource;
use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Acl\Adapter\Memory as AclList;

class SecurityPlugin extends Plugin {

	
	public function beforeExecuteRoute (Event $event, Dispatcher $dispatcher) {
	
		// On vérifie que l'internaute est connecté :
		$auth = $this->session->get('user');
		// Puis on définie son rôle :
		if ($auth != null) {
			$idRole = $auth->getRole();
			if ($idRole == "1") {
				$role = 'user';
			}
			else if ($idRole == "2") {
				$role = 'author';
			}
			else if ($idRole == "3") {
				$role = 'admin';
			}
		
			 
			// On cherche le controller et l'action :
			$controller = $dispatcher->getControllerName();
			$action = $dispatcher->getActionName();
			
			// On récupère la liste des ACL :
			$acl = $this->getAcl();
			
			// On regarde si le rôle a accès au controller (resource) :
			$allowed = $acl->isAllowed($role, $controller, $action);
			// ALLOW = 1
			if ($allowed != Acl::ALLOW) {
				// S'il n'a pas accès on renvoie à l'index :
				$dispatcher->forward(
					array(
						'controller' => 'index',
						'action' => 'index'
					)		
				);
	
				
				// On retourne FAUX pour arrêter l'operation :
				return false;
				
			}
		}
	}
	
	
	public function getAcl () {
		// Création ACL :
		$acl = new AclList();
		// L'action par défaut est egal à DENY (0) :
		$acl->setDefaultAction(Acl::DENY);
		
		//Enregistre trois rôles :
		$roles = array (
				'user' => new Role('user'),
				'author' => new Role('author'),
				'admin' => new Role('admin')
		);
		
		// Pour chaque rôle, je l'ajoute dans l'AclList
		foreach ($roles as $role) {
			$acl->addRole($role);
		}
	
		
		// On définit les ressources pour chaque zone.
		// Les noms des controllers sont des ressources.
		
		$publicResources = array (
			'connexion' => array ('index', 'connexion', 'deconnexion'),
			'index' => array ('index'),
			'default' => array ('asAdmin', 'asAuthor', 'asUser','index')
		);
		foreach ($publicResources as $resource => $actions) {
			$acl->addResource(new Resource($resource), $actions);
		}
		
		$userResources = array (
			'projects' => array ('index'),
			'users' => array ('index','projects', 'project')
		);
		foreach ($userResources as $resource => $actions) {
			$acl->addResource(new Resource($resource), $actions);
		}
		
		$authorResources = array (
			'projects' => array ('index', 'equipe'),
			'users' => array ('index','projects', 'project'),
			'messages' => array ('index'),
			'taches' => array('index', 'frm','show')
		);
		foreach ($authorResources as $resource => $actions) {
			$acl->addResource(new Resource($resource), $actions);
		}
		
		$adminResources = array (
			'projects' => array ('index', 'equipe'),
			'users' => array ('index','projects', 'project'),
			'messages' => array ('index'),
			'taches' => array('index', 'frm','show'),
			'useCases' => array ('index'),
		);
		foreach ($adminResources as $resource => $actions) {
			$acl->addResource(new Resource($resource), $actions);
		}
		
		
		// Tout le monde a accès aux ressources publiques :
		foreach ($roles as $role) {
			foreach ($publicResources as $resource => $actions) {
				$acl->allow($role->getName(), $resource, '*');
			}
		}
		// Accès des userResources uniquement aux users :
		foreach ($userResources as $resource => $actions) {
			foreach ($actions as $action) {
				$acl->allow('user', $resource, $action);
			}
		}
		// Pour author :
		foreach ($authorResources as $resource => $actions) {
			foreach ($actions as $action) {
				$acl->allow('author', $resource, $action);
			}
		}
		// Pour admin :
		foreach ($adminResources as $resource => $actions) {
			foreach ($actions as $action) {
				$acl->allow('admin', $resource, $action);
			}
		}
		return $acl;
				
	}
	
	
}