<?php
use Phalcon\Acl as PhalconAcl;
use Phalcon\Acl\Role as aclRole;
use Phalcon\Acl\Resource;
use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Acl\Adapter\Memory as AclList;


class SecurityPlugin extends Plugin {
	
	public function beforeExecuteRoute (Event $event, Dispatcher $dispatcher) {
	
		// On verifie que l'internaute est connect� :
		$auth = $this->session->get('user');
		// Puis on definie son rôle :
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
			
			// On recupere la liste des ACL :
			$acl = $this->getAcl();
			
			// On regarde si le role a accès au controller (resource) :
			$allowed = $acl->isAllowed($role, $controller, $action);
			// ALLOW = 1
			if ($allowed != PhalconAcl::ALLOW) {
				// S'il n'a pas acces on renvoie à l'index :
				$dispatcher->forward(
					array(
						'controller' => 'index',
						'action' => 'index',
					)		
				);
	
				
				// On retourne FAUX pour arreter l'operation :
				return false;
				
			}
		}
	}
	
	
	public function getAcl () {
		
		// Creation ACL :
		$acl = new AclList();
		// L'action par defaut est egal à DENY (0) :
		$acl->setDefaultAction(PhalconAcl::DENY);
	
		
		// On definit les ressources pour chaque zone.
		// Les noms des controllers sont des ressources.
		
		$roles = Role::find();
		$accesslists = Acl::find();
		$resources = Ressource::find();	
		
		foreach ($roles as $role) {
			$acl->addRole($role->getLibelle());
		
		}	
		
		foreach ($resources as $resource){
			$actions=$resource->getActions()->toArray();
			$actionsNames=array_map(function($e){return $e["nom_action"];}, $actions);
			$acl->addResource(new Resource($resource->getNom()), $actionsNames);
		}
		
		foreach ($accesslists as $accesslist) {
				$acl->allow($accesslist->getRole()->getLibelle(), $accesslist->getRessource(), $accesslist->getAction());
		}		
		
		return $acl;
				
	}
	
	
}