<?php

class Acl extends BaseModel
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var integer
     */
    public $idRole;

    /**
     *
     * @var string
     */
    public $nom_ressource;

    /**
     *
     * @var string
     */
    public $nom_action;

    /**
     *
     * @var integer
     */
    public $allowed;

   
    
    public function setId($id)
    {
    	$this->id = $id;
    	return $this;
    }
    
    public function setIdRole($idRole)
    {
    	$this->idRole = $idRole;
    	return $this;
    }
    
    public function setRessource($nom_ressource)
    {
    	$this->nom_ressource = $nom_ressource;
    	return $this;
    }
    
    public function setAction($nom_action)
    {
    	$this->nom_action = $nom_action;
    	return $this;
    }
    
    public function setAllowed($allowed)
    {
    	$this->allowed = $allowed;
    	return $this;
    }
    
    public function getId()
    {
    	return $this->id;
    }
    
    public function getIdRole()
    {
    	return $this->idRole;
    }
    
    public function getRessource()
    {
    	return $this->nom_ressource;
    }
    
    public function getAction()
    {
    	return $this->nom_action;
    }
    
    public function getAllowed()
    {
    	return $this->allowed;
    }
    
    
    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource("'Acl'");
        $this->belongsTo('nom_ressource', 'Ressource', 'nom', array('alias' => 'Ressource'));
        $this->belongsTo('nom_action', 'Action', 'nom_action', array('alias' => 'Action'));
        $this->belongsTo('idRole', 'Role', 'id', array('alias' => 'Role'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'Acl';
    }
    

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Acl[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Acl
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
