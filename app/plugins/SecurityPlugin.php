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
	
		// On v�rifie que l'internaute est connect� :
		$auth = $this->session->get('user');
		// Puis on d�finie son r�le :
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
			
			// On r�cup�re la liste des ACL :
			$acl = $this->getAcl();
			
			// On regarde si le r�le a acc�s au controller (resource) :
			$allowed = $acl->isAllowed($role, $controller, $action);
			// ALLOW = 1
			if ($allowed != Acl::ALLOW) {
				// S'il n'a pas acc�s on renvoie � l'index :
				$dispatcher->forward(
					array(
						'controller' => 'index',
						'action' => 'index'
					)		
				);
	
				
				// On retourne FAUX pour arr�ter l'operation :
				return false;
				
			}
		}
	}
	
	
	public function getAcl () {
		// Cr�ation ACL :
		$acl = new AclList();
		// L'action par d�faut est egal � DENY (0) :
		$acl->setDefaultAction(Acl::DENY);
		
		//Enregistre trois r�les :
		$roles = array (
				'user' => new Role('user'),
				'author' => new Role('author'),
				'admin' => new Role('admin')
		);
		
		// Pour chaque r�le, je l'ajoute dans l'AclList
		foreach ($roles as $role) {
			$acl->addRole($role);
		}
	
		
		// On d�finit les ressources pour chaque zone.
		// Les noms des controllers sont des ressources.
		
		/*$publicResources = array (
			'Connexion' => array ('index', 'connexion', 'deconnexion'),
			'Index' => array ('index'),
			'Default' => array ('asAdmin', 'asAuthor', 'asUser','index', 'update', 'delete', 'frm'),
			'Projects' => array('index','equipe','messages','messagefil'),
			'Users' => array('index','projects', 'project')
		);
		foreach ($publicResources as $resource => $actions) {
			$acl->addResource(new Resource($resource), $actions);
		}*/
		
		$userResources = array (
			'Connexion' => array ('index', 'connexion', 'deconnexion'),
			'index' => array ('index'),
			'Default' => array ('asAdmin', 'asAuthor', 'asUser','index', 'update', 'delete', 'frm'),
			'projects' => array('index','equipe','messages','messagefil'),
			'users' => array('index','projects', 'project'),
			'Messages' => array ('index'),
			'Taches' => array('index', 'frm','show','add'),
			'UseCases' => array ('index','add','show','frm'),
		);
		foreach ($userResources as $resource => $actions) {
			$acl->addResource(new Resource($resource), $actions);
		}
		
		$authorResources = array (
			'Connexion' => array ('index', 'connexion', 'deconnexion'),
			'index' => array ('index'),
			'Default' => array ('asAdmin', 'asAuthor', 'asUser','index', 'update', 'delete', 'frm'),
			'projects' => array('index','equipe','messages','messagefil'),
			'users' => array('index','projects', 'project'),
			'Messages' => array ('index'),
			'Taches' => array('index', 'frm','show','add'),
			'UseCases' => array ('index','add','show','frm'),
		);
		foreach ($authorResources as $resource => $actions) {
			$acl->addResource(new Resource($resource), $actions);
		}
		
		$adminResources = array (
			'Connexion' => array ('index', 'connexion', 'deconnexion'),
			'index' => array ('index'),
			'Default' => array ('asAdmin', 'asAuthor', 'asUser','index', 'update', 'delete', 'frm'),
			'projects' => array('index','equipe','messages','messagefil'),
			'users' => array('index','projects', 'project'),
			'Messages' => array ('index'),
			'Taches' => array('index', 'frm','show','add'),
			'UseCases' => array ('index','add','show','frm'),
		);
		foreach ($adminResources as $resource => $actions) {
			$acl->addResource(new Resource($resource), $actions);
		}
		
		
		// Tout le monde a acc�s aux ressources publiques :
		/*foreach ($roles as $role) {
			foreach ($publicResources as $resource => $actions) {
				$acl->allow($role->getName(), $resource, '*');
			}
		}*/
		
		// Acc�s des userResources uniquement aux users :
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