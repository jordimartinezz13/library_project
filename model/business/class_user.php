<?php

class user{
    public $id;
    public $userName;
    public $password;

    public function __construct($userName, $password){
		$this->setId(null);
		$this->setUserName($userName);
    $this->setPassword($password);
	}

	public function getId(){
		return $this->id;
	}

	public function setId($value){
		$this->id = $value;
	}

	public function getUserName(){
		return $this->userName;
	}

	public function setUserName($value){
		$this->userName = $value;
	}

  public function getPassword(){
		return $this->password;
	}

	public function setPassword($value){
		$this->password = $value;
	}

}
 ?>
