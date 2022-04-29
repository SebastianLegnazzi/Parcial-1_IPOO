<?php
class Empresa{
    private $identificacion;
    private $nombre;
    private $arrayObjViajes;
    
    /**************************************/
	/**************** SET *****************/
	/**************************************/

    /**
     * Establece el valor de identificacion
     */ 
    public function setIdentificacion($identificacion){
        $this->identificacion = $identificacion;
    }

    /**
     * Establece el valor de nombre
     */ 
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    /**
     * Establece el valor de arrayObjViajes
     */ 
    public function setArrayObjViajes($arrayObjViajes){
        $this->arrayObjViajes = $arrayObjViajes;
    }


	/**************************************/
	/**************** GET *****************/
	/**************************************/

    /**
     * Obtiene el valor de identificacion
     */ 
    public function getIdentificacion(){
        return $this->identificacion;
    }

    /**
     * Obtiene el valor de nombre
     */ 
    public function getNombre(){
        return $this->nombre;
    }

    /**
     * Obtiene el valor de arrayObjViajes
     */ 
    public function getArrayObjViajes(){
        return $this->arrayObjViajes;
    }


	/**************************************/
	/************** FUNCIONES *************/
	/**************************************/

    public function __construct($identificacion, $nombre, $arrayObjViajes){
		$this->identificacion = $identificacion;
        $this->nombre = $nombre;
        $this->arrayObjViajes = $arrayObjViajes;
	}

	/**
     * Este modulo devuelve un array con todos los viajes con el destino ingresado y asientos disponibles
     * @param string $elDestino
     * @param int $asientos
     * @return array
     */
	public function darViajeADestino($elDestino, $asientos){
		$arrayObjViajes = $this->getArrayObjViajes();
		$arrayViajeDisp = [];
		foreach($arrayObjViajes as $viaje){
			if((strtolower($viaje->getDestino()) == strtolower($elDestino)) && ($viaje->getCantAsientosDisp() >= $asientos)){
				array_push($arrayViajeDisp, $viaje);
			}
		}
		return $arrayViajeDisp;
	}

	/**
     * Este modulo incorpora un viaje que no este creado
     * @param object $objViaje
     * @return boolean
     */
	public function incorporarViaje($objViaje){
		$arrayObjViajes = $this->getArrayObjViajes();
		$validacion = false;
		if($this->buscarMismoVuelo($objViaje)){
			array_push($arrayObjViajes, $objViaje);
			$this->setArrayObjViajes($arrayObjViajes);
			$validacion = true;
		}
		return $validacion;
	}

	/**
     * Este modulo vende un viaje con el destino deseado y asientos disponibles
     * @param int $canAsientos
     * @param string $destino
     * @return object
     */
	public function venderViajeADestino($canAsientos, $destino){
		$viajeAsignado = null;
		$arrayObjViajeDisp = $this->darViajeADestino($destino, $canAsientos);
		if(count($arrayObjViajeDisp) > 0){
			$arrayObjViajeDisp[0]->asignarAsientosDisponibles($canAsientos);
			$viajeAsignado = $arrayObjViajeDisp[0];
		}
		return $viajeAsignado;
	}

	/**
     * Este modulo devuelve el monto recaudado de la empresa
     * @return int
     */
	public function montoRecaudado(){
		$arrayObjViajes = $this->getArrayObjViajes();
		$recaudado = 0;
		foreach($arrayObjViajes as $viaje){
			$asientosVendidos = $viaje->getCantAsientosTot() - $viaje->getCantAsientosDisp();
			$recaudado = $recaudado + ($asientosVendidos * $viaje->getImporte());
		}
		return $recaudado;
	}

	public function __toString(){
		return (
			"La identificacion de la empresa es: ".$this->getIdentificacion()."\n".
			"El nombre de la empresa es: ".$this->getIdentificacion()."\n".
			"Los viajes de la empresa son: "."\n".$this->viajesToString()."\n");
	}

	/**************************************/
	/********* FUNCIONES PRIVADAS *********/
	/**************************************/

	private function viajesToString(){
        $arrayObjViajes = $this->getArrayObjViajes();
        $separador = "============================";
        $string = $separador."\n";
        foreach($arrayObjViajes as $viaje){
            $string.=$viaje."\n".$separador."\n";
        }
        return $string;
    }

	private function buscarMismoVuelo($objViaje){
		$arrayObjViajes = $this->getArrayObjViajes();
		$buscar = true;
		$i = 0;
		while($buscar && $i < count($arrayObjViajes)){
			if((strtolower($arrayObjViajes[$i]->getDestino()) == strtolower($objViaje->getDestino())) && ($arrayObjViajes[$i]->getFecha() == $objViaje->getFecha()) && ($arrayObjViajes[$i]->getHoraPartida() == $objViaje->getHoraPartida())){
				$buscar = false;
			}else{
				$i++;
			}
		}
		return $buscar;
	}



}

?>