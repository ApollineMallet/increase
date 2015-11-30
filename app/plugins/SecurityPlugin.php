<?php

use Phalcon\Acl;
use Phalcon\Acl\Role;
use Phalcon\Acl\Resource;
use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Acl\Adapter\Memory as AclList;

class SecurityPlugin extends Plugin {

	public function getAcl () {
		// Création ACL :
		$acl = new AclList();
		// L'action par défaut est DENY access :
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
		
		$publicRessources = array (
			'connexion' => array ('index', 'connexion', 'deconnexion'),
			'index' => array ('index'),
			'default' => array ('asAdmin', 'asAuthor', 'asUser','index')
		);
		
		$userRessources = array (
			'projects' => array ('index'),
			'users' => array ('index','projects', 'project')
		);
		
		$authorRessources = array (
			'projects' => array ('index', 'equipe'),
			'users' => array ('index','projects', 'project'),
			'messages' => array ('index'),
			'taches' => array('index', 'frm','show')
		);
		
		$adminRessources = array (
			'projects' => array ('index', 'equipe'),
			'users' => array ('index','projects', 'project'),
			'messages' => array ('index'),
			'taches' => array('index', 'frm','show'),
			'useCases' => array ('index'),
		);
		
		
		// https://docs.phalconphp.com/fr/latest/reference/tutorial-invo-2.html
		// http://slamwi.kobject.net/slam4/php/phalcon/project/increase/todo?s[]=increase#liste_des_projets_d_un_client
				
	}
	
}