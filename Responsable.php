<?php
class Clase4{
    private $nombre;
    private $apellido;
    private $documento;
    private $direccion;
    private $mail;
    private $telefono;
	
    /**************************************/
	/**************** SET *****************/
	/**************************************/

    /**
     * Establece el valor de nombre
     */ 
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    /**
     * Establece el valor de apellido
     */ 
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    /**
     * Establece el valor de documento
     */ 
    public function setDocumento($documento){
        $this->documento = $documento;
    }

    /**
     * Establece el valor de direccion
     */ 
    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }

    /**
     * Establece el valor de mail
     */ 
    public function setMail($mail){
        $this->mail = $mail;
    }

    /**
     * Establece el valor de telefono
     */ 
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }


	/**************************************/
	/**************** GET *****************/
	/**************************************/

    /**
     * Obtiene el valor de nombre
     */ 
    public function getNombre(){
        return $this->nombre;
    }

    /**
     * Obtiene el valor de apellido
     */ 
    public function getApellido(){
        return $this->apellido;
    }

    /**
     * Obtiene el valor de documento
     */ 
    public function getDocumento(){
        return $this->documento;
    }

    /**
     * Obtiene el valor de direccion
     */ 
    public function getDireccion(){
        return $this->direccion;
    }

    /**
     * Obtiene el valor de mail
     */ 
    public function getMail(){
        return $this->mail;
    }

    /**
     * Obtiene el valor de telefono
     */ 
    public function getTelefono(){
        return $this->telefono;
    }

	/**************************************/
	/************** FUNCIONES *************/
	/**************************************/

    public function __construct($nombre, $apellido, $documento, $direccion, $mail, $telefono){
		$this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->documento = $documento;
        $this->direccion = $direccion;
        $this->mail = $mail;
        $this->telefono = $telefono;
	}

	public function __toString(){
		return (
			"El nombre del responsable es: ".$this->getNombre()."\n".
			"El apellido del responsable es: ".$this->getApellido()."\n".
			"El documento del responsable es: ".$this->getDocumento()."\n".
			"La direccion del responsable es: ".$this->getDireccion()."\n".
			"El mail del responsable es: ".$this->getMail()."\n".
			"El telefono del responsable es: ".$this->getTelefono()."\n");
	}

}

?>