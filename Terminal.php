<?php
class Terminal{
    private $denominacion;
    private $direccion;
    private $arrayObjEmpresa;
    
    /**************************************/
	/**************** SET *****************/
	/**************************************/

	/**
     * Establece el valor de denominacion
     */ 
    public function setDenominacion($denominacion){
        $this->denominacion = $denominacion;
    }

    /**
     * Establece el valor de direccion
     */ 
    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }

    /**
     * Establece el valor de arrayObjEmpresa
     */ 
    public function setArrayObjEmpresa($arrayObjEmpresa){
        $this->arrayObjEmpresa = $arrayObjEmpresa;
    }


	/**************************************/
	/**************** GET *****************/
	/**************************************/

    /**
     * Obtiene el valor de denominacion
     */ 
    public function getDenominacion(){
        return $this->denominacion;
    }

    /**
     * Obtiene el valor de direccion
     */ 
    public function getDireccion(){
        return $this->direccion;
    }

    /**
     * Obtiene el valor de arrayObjEmpresa
     */ 
    public function getArrayObjEmpresa(){
        return $this->arrayObjEmpresa;
    }


	/**************************************/
	/************** FUNCIONES *************/
	/**************************************/

	public function __construct($denominacion, $direccion, $arrayObjEmpresa){
		$this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->arrayObjEmpresa = $arrayObjEmpresa;
	}

	public function ventaAutomatica($cantAsientos, $fecha, $destino, $empresa){
		$objEmpresa = $this->buscarEmpresa($empresa);
		$arraydestinosDisp = $objEmpresa->darViajeADestino($destino, $cantAsientos);
		$buscar = true;
		$validacion = null;
		$i = 0;
		while($buscar && $i <= count($arraydestinosDisp)){
			if($arraydestinosDisp[$i]->getFecha() == $fecha){
				$validacion = $arraydestinosDisp[$i];
				$arraydestinosDisp[$i]->asignarAsientosDisponibles($cantAsientos);
				$buscar = false;
			}else{
				$i++;
			}
		}
		return $validacion;
	}

	public function empresaMayorRecaudacion(){
		$arrayObjEmpresa = $this->getArrayObjEmpresa();
		$mayorReca = $arrayObjEmpresa[0]->montoRecaudado();
		$empresaMayorRec = $arrayObjEmpresa[0];
		foreach($arrayObjEmpresa as $empresa){
			if($empresa->montoRecaudado() > $mayorReca){
				$empresaMayorRec = $empresa;
			}
		}
		return $empresaMayorRec;
	}

	public function responsableViaje($numeroViaje){
		$arrayObjEmpresa = $this->getArrayObjEmpresa();
		$buscar = true;
		$responsable = null;
		$j=0;
		$i = 0;
		while($buscar && $i < count($arrayObjEmpresa)){
			$arrayObjViaje = $arrayObjEmpresa[$i]->getArrayObjViajes();
			$j = 0;
			while($buscar && $j < count($arrayObjViaje)){
				if($arrayObjViaje[$j]->getNumero() == $numeroViaje){
					$buscar = false;
					$responsable = $arrayObjViaje[$j]->getObjResponsable();
				}else{
					$j++;
				}
			}
			$i++;
		}
		return $responsable;
	}

	public function __toString(){
		return (
			"La denominacion de la terminal es: ".$this->getDenominacion()."\n".
			"La direccion de la terminal es: ".$this->getDireccion()."\n".
			"Las empresas registradas en la terminal son: "."\n".$this->empresasToString()."\n");
	}

	/**************************************/
	/********* FUNCIONES PRIVADAS *********/
	/**************************************/

	private function buscarEmpresa($nombreEmpresa){
		$arrayObjEmpresa = $this->getArrayObjEmpresa();
		$buscar = true;
		$empresa = null;
		$i = 0;
		while($buscar && $i <= count($arrayObjEmpresa)){
			if(strtolower($arrayObjEmpresa[$i]->getNombre()) == strtolower($nombreEmpresa)){
				$buscar = false;
				$empresa = $arrayObjEmpresa[$i];
			}else{
				$i++;
			}
		}
		return $empresa;
	}

	private function empresasToString(){
        $arrayObjEmpresas = $this->getArrayObjEmpresa();
        $separador = "============================";
        $string = $separador."\n";
        foreach($arrayObjEmpresas as $empresa){
            $string.=$empresa."\n".$separador."\n";
        }
        return $string;
    }



}

?>