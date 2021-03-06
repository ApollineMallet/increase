<?php
use Phalcon\Mvc\View;
class DefaultController extends ControllerBase {
	protected $model;
	protected $messageTimerInterval = 3000;
	public function initialize() {
		if ($this->request->isAjax ()) {
			$this->view->setRenderLevel ( View::LEVEL_ACTION_VIEW );
		}
	}
	public function indexAction($message = NULL) {
		$msg = "";
		$show = "";
		
		if ($this->session->get("user")->getRole() != 1) {
		
			if (isset ( $message )) {
				if (is_string ( $message )) {
					$message = new DisplayedMessage ( $message );
				}
				$message->setTimerInterval ( $this->messageTimerInterval );
				$msg = $this->_showDisplayedMessage ( $message );
			}
			if ($this->model != "Usecase" & "Tache") {
				
				$show = "class='hidden'";
			} else {
				$show = "";
			}
			
			$objects = call_user_func ( $this->model . "::find" );
			$this->view->setVars ( array (
					"objects" => $objects,
					"siteUrl" => $this->url->getBaseUri (),
					"baseHref" => $this->dispatcher->getControllerName (),
					"model" => $this->model,
					"msg" => $msg,
					"show" => $show,
					"user" => $this->session->get("user")
			) );
			$this->jquery->getOnClick ( ".update, .add", "", "#content", array (
					"attr" => "data-ajax" 
			) );
			$this->jquery->getOnClick ( ".delete", "", "#message", array (
					"attr" => "data-ajax" 
			) );
			$this->jquery->compile ( $this->view );
			$this->view->pick ( "main/index" );
		}
		else
		{
			$this->dispatcher->forward ( array (
					"controller" => "users",
					"action" => "projects",
					"params" => array (
							$msg 
					) 
			) );
		}
	}
	
	/**
	 * Retourne une instance de $model<br>
	 * si $id est nul, un nouvel objet est retourn�<br>
	 * sinon l'objet retourn� est celui charg� depuis la BDD � partir de l'id $id
	 *
	 * @param string $id        	
	 * @return multitype:$className
	 */
	public function getInstance($id = NULL) {
		if (isset ( $id )) {
			$object = call_user_func ( $this->model . "::findfirst", $id );
		} else {
			$className = $this->model;
			$object = new $className ();
		}
		return $object;
	}
	
	/**
	 * Affiche le formulaire d'ajout ou de modification d'une instance de $model<br>
	 * L'instance est d�finie � partir de $id<br>
	 * frm doit utiliser la m�thode getInstance() pour obtenir l'instance � ajouter ou � modifier
	 *
	 * @see DefaultController::getInstance()
	 * @param string $id        	
	 */
	
	
	public function frmAction($id = NULL) {
		echo "A surd�finir...<br>Sans oublier l'appel de la m�thode parent en fin.";
		$this->jquery->postFormOnClick ( ".validate", $this->dispatcher->getControllerName () . "/update", "frmObject", "#content" );
		$this->jquery->getOnClick ( ".cancel", "", "#content", array (
				"attr" => "data-ajax" 
		) );
		$this->jquery->compile ( $this->view );
		$this->view->setVar("baseHref", $this->dispatcher-> getControllerName());
	}
	public function asAdminAction() {
		$user = User::findFirst( "role='3'" );
		$this->session->set( "user", $user );
		$this->response->redirect( "index" );
	}
	public function asUserAction() {
		$user = User::findFirst( "role='1'" );
		$this->session->set( "user", $user );
		$this->response->redirect( "index" );
	}
	public function asAuthorAction() {
		$user = User::findFirst( "role='2'" );
		$this->session->set( "user", $user );
		$this->response->redirect( "index" );
	}
	
	/**
	 * Affecte membre � membre les valeurs du tableau associatif $_POST aux membres de l'objet $object<br>
	 * Pr�voir une sur-d�finition de la m�thode pour l'affectation des membres de type objet<br>
	 * Cette m�thode est utilis�e update()
	 *
	 * @see DefaultController::update()
	 * @param multitype:$className $object        	
	 */
	protected function setValuesToObject(&$object) {
		$object->assign ( $_POST );
	}
	
	/**
	 * Affiche un message Alert bootstrap
	 *
	 * @param DisplayedMessage $message        	
	 */
	public function _showDisplayedMessage($message) {
		return $message->compile ( $this->jquery );
	}
	/**
	 * Affiche un message Alert bootstrap
	 *
	 * @param string $message
	 *        	texte du message
	 * @param string $type
	 *        	type du message (info, success, warning ou danger)
	 * @param number $timerInterval
	 *        	dur�e en millisecondes d'affichage du message (0 pour que le message reste affich�)
	 * @param string $dismissable
	 *        	si vrai, l'alert dispose d'une croix de fermeture
	 */
	public function _showMessage($message, $type = "success", $timerInterval = 0, $dismissable = true, $visible = true) {
		$message = new DisplayedMessage ( $message, $type, $timerInterval, $dismissable, $visible );
		$this->_showDisplayedMessage ( $message );
	}
	
	/**
	 * Met � jour � partir d'un post une instance de $model<br>
	 * L'affectation des membres de l'objet par le contenu du POST se fait par appel de la m�thode setValuesToObject()
	 *
	 * @see DefaultController::setValuesToObject()
	 */
	public function updateAction() {
		
		if ($this->request->isPost ()) {
			$object = $this->getInstance ( @$_POST ["id"] );
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
	public function deleteAction($id) {
		$object = call_user_func ( $this->model . "::findfirst", $id );
		$bs = $this->jquery->bootstrap ();
		$btYes = $bs->htmlButton ( "btYes", "Supprimer" )->setSize ( "btn-sm" );
		$btYes->getOnClick ( $this->dispatcher->getControllerName () . "/_delete/" . $id, "#content" );
		$btYes->onClick ( "$('#message').html('');" );
		$btCancel = $bs->htmlButton ( "btCancel", "Annuler" )->setSize ( "btn-sm" );
		$btCancel->onClick ( "$('#message').html('');" );
		$this->view->setVars ( array (
				"object" => $object 
		) );
		$this->view->pick ( "main/delete" );
		$this->jquery->compile ( $this->view );
	}
	/**
	 * Supprime l'instance dont l'id est $id dans la BDD
	 *
	 * @param int $id        	
	 */
	public function _deleteAction($id) {
		try {
			$object = call_user_func ( $this->model . "::findfirst", $id );
			if ($object != NULL) {
				$object->delete ();
				$msg = new DisplayedMessage ( $this->model . " `{$object->toString()}` supprimé(e)" );
			} else {
				$msg = new DisplayedMessage ( $this->model . " introuvable", "warning" );
			}
		} catch ( \Exception $e ) {
			$msg = new DisplayedMessage ( "Impossible de supprimer l'instance de " . $this->model, "danger" );
		}
		$this->dispatcher->forward ( array (
				"controller" => $this->dispatcher->getControllerName (),
				"action" => "index",
				"params" => array (
						$msg 
				) 
		) );
	}
	
	/**
	 * Affiche un message Alert bootstrap de type success
	 *
	 * @param string $message
	 *        	texte du message
	 * @param number $timerInterval
	 *        	dur�e en millisecondes d'affichage du message (0 pour que le message reste affich�)
	 * @param string $dismissable
	 *        	si vrai, l'alert dispose d'une croix de fermeture
	 */
	public function messageSuccess($message, $timerInterval = 0, $dismissable = true) {
		$this->_showMessage ( $message, "success", $timerInterval, $dismissable );
	}
	/**
	 * Affiche un message Alert bootstrap de type warning
	 *
	 * @param string $message
	 *        	texte du message
	 * @param number $timerInterval
	 *        	dur�e en millisecondes d'affichage du message (0 pour que le message reste affich�)
	 * @param string $dismissable
	 *        	si vrai, l'alert dispose d'une croix de fermeture
	 */
	public function messageWarning($message, $timerInterval = 0, $dismissable = true) {
		$this->_showMessage ( $message, "warning", $timerInterval, $dismissable );
	}
	/**
	 * Affiche un message Alert bootstrap de type danger
	 *
	 * @param string $message
	 *        	texte du message
	 * @param number $timerInterval
	 *        	dur�e en millisecondes d'affichage du message (0 pour que le message reste affich�)
	 * @param string $dismissable
	 *        	si vrai, l'alert dispose d'une croix de fermeture
	 */
	public function messageDanger($message, $timerInterval = 0, $dismissable = true) {
		$this->_showMessage ( $message, "danger", $timerInterval, $dismissable );
	}
	/**
	 * Affiche un message Alert bootstrap de type info
	 *
	 * @param string $message
	 *        	texte du message
	 * @param number $timerInterval
	 *        	dur�e en millisecondes d'affichage du message (0 pour que le message reste affich�)
	 * @param string $dismissable
	 *        	si vrai, l'alert dispose d'une croix de fermeture
	 */
	public function messageInfo($message, $timerInterval = 0, $dismissable = true) {
		$this->_showMessage ( $message, "info", $timerInterval, $dismissable );
	}
}