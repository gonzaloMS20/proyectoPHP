<?php 

Class Usuario{

	private $idUsuario;
	private $idAdmin;
	private $nombre;
	private $apPaterno;
	private $apMaterno;
	private $userName;
	private $password;
	
	public function __construct($userName,$password){
		$this->userName=$userName;
		$this->password=$password;
	} 
	
	public function construct2($idAdmin,$nombre,$apPaterno,$apMaterno,$userName,$password){
		$this->idAdmin=$idAdmin;
		$this->nombre=$nombre;
		$this->apPaterno=$apPaterno;
		$this->apMaterno=$apMaterno;
		$this->userName=$userName;
		$this->password=$password;
	} 
	
	public function getIdUsuario(){
		return $this->idUsuario;
	}
	
	public function geAdmin(){
		return $this->idAdmin;
	}
	
	public function getNombre(){
		return $this->nombre;
	}
	
	public function getApPaterno(){
		return $this->apPaterno;
	}
	
	public function getApMaterno(){
		return $this->apMaterno;
	}
	
	public function getUserName(){
		return $this->userName;
	}
	
	public function getPassword(){
		return $this->password;
	}
	
}

?>
