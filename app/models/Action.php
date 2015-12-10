<?php

class Action extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    protected $nom_action;

    /**
     *
     * @var string
     */
    protected $nom_ressource;

    /**
     * Method to set the value of field nom_action
     *
     * @param string $nom_action
     * @return $this
     */
    public function setNomAction($nom_action)
    {
        $this->nom_action = $nom_action;

        return $this;
    }

    /**
     * Method to set the value of field nom_ressource
     *
     * @param string $nom_ressource
     * @return $this
     */
    public function setNomRessource($nom_ressource)
    {
        $this->nom_ressource = $nom_ressource;

        return $this;
    }

    /**
     * Returns the value of field nom_action
     *
     * @return string
     */
    public function getNomAction()
    {
        return $this->nom_action;
    }

    /**
     * Returns the value of field nom_ressource
     *
     * @return string
     */
    public function getNomRessource()
    {
        return $this->nom_ressource;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('nom_action', 'Acl', 'nom_action', array('alias' => 'Acl'));
        $this->belongsTo('nom_ressource', 'Ressource', 'nom', array('alias' => 'Ressource'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'action';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Action[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Action
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
