<?php
abstract class BaseModel extends \Phalcon\Mvc\model{

	public function __toString(){
		return $this->toString();
	}
}