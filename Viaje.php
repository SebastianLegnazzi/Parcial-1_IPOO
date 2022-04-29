<?php
class Viaje{
    private $destino;
    private $horaPartida;
    private $horaLlegada;
    private $numero;
    private $importe;
    private $fecha;
    private $cantAsientosTot;
    private $cantAsientosDisp;
    private $objResponsable;
    
    /**************************************/
	/**************** SET *****************/
	/**************************************/

    /**
     * Establece el valor de destino
     */ 
    public function setDestino($destino){
        $this->destino = $destino;
    }

    /**
     * Establece el valor de horaPartida
     */ 
    public function setHoraPartida($horaPartida){
        $this->horaPartida = $horaPartida;
    }

    /**
     * Establece el valor de horaLlegada
     */ 
    public function setHoraLlegada($horaLlegada){
        $this->horaLlegada = $horaLlegada;
    }

    /**
     * Establece el valor de numero
     */ 
    public function setNumero($numero){
        $this->numero = $numero;
    }

    /**
     * Establece el valor de importe
     */ 
    public function setImporte($importe){
        $this->importe = $importe;
    }

    /**
     * Establece el valor de fecha
     */ 
    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    /**
     * Establece el valor de cantAsientosTot
     */ 
    public function setCantAsientosTot($cantAsientosTot){
        $this->cantAsientosTot = $cantAsientosTot;
    }

    /**
     * Establece el valor de cantAsientosDisp
     */ 
    public function setCantAsientosDisp($cantAsientosDisp){
        $this->cantAsientosDisp = $cantAsientosDisp;
    }

    /**
     * Establece el valor de objResponsable
     */ 
    public function setObjResponsable($objResponsable){
        $this->objResponsable = $objResponsable;
    }


	/**************************************/
	/**************** GET *****************/
	/**************************************/

    /**
     * Obtiene el valor de destino
     */ 
    public function getDestino(){
        return $this->destino;
    }

    /**
     * Obtiene el valor de horaPartida
     */ 
    public function getHoraPartida(){
        return $this->horaPartida;
    }

    /**
     * Obtiene el valor de horaLlegada
     */ 
    public function getHoraLlegada(){
        return $this->horaLlegada;
    }

    /**
     * Obtiene el valor de numero
     */ 
    public function getNumero(){
        return $this->numero;
    }

    /**
     * Obtiene el valor de importe
     */ 
    public function getImporte(){
        return $this->importe;
    }

    /**
     * Obtiene el valor de fecha
     */ 
    public function getFecha(){
        return $this->fecha;
    }

    /**
     * Obtiene el valor de cantAsientosTot
     */ 
    public function getCantAsientosTot(){
        return $this->cantAsientosTot;
    }

    /**
     * Obtiene el valor de cantAsientosDisp
     */ 
    public function getCantAsientosDisp(){
        return $this->cantAsientosDisp;
    }

    /**
     * Obtiene el valor de objResponsable
     */ 
    public function getObjResponsable(){
        return $this->objResponsable;
    }

	/**************************************/
	/************** FUNCIONES *************/
	/**************************************/

    public function __construct($destino, $horaPartida, $horaLlegada, $numero, $importe, $fecha, $cantAsientosTot, $cantAsientosDisp, $objResponsable){
		$this->destino = $destino;
        $this->horaPartida = $horaPartida;
        $this->horaLlegada = $horaLlegada;
        $this->numero = $numero;
        $this->importe = $importe;
        $this->fecha = $fecha;
        $this->cantAsientosTot = $cantAsientosTot;
        $this->cantAsientosDisp = $cantAsientosDisp;
        $this->objResponsable = $objResponsable;
	}

    /**
     * Este modulo devuelve true si hay asientos disponibles, false en caso contrario
     * @param int $cantAsientos
     * @return boolean
     */
	public function asignarAsientosDisponibles($cantAsientos){
		if($this->getCantAsientosDisp() >= $cantAsientos){
			$asientosOcupados = $this->getCantAsientosDisp() - $cantAsientos;
			$this->setCantAsientosDisp($asientosOcupados);
			$validacion = true;
		}else{
			$validacion = false;
		}
		return $validacion;
	}

	public function __toString(){
		return(
			"El destino del vuelo es: ".$this->getDestino()."\n".
			"La hora de partida del vuelo es: ".$this->getHoraPartida()."\n".
			"La hora de llegada del vuelo es: ".$this->getHoraLlegada()."\n".
			"El numero del vuelo es: ".$this->getNumero()."\n".
			"El importe del vuelo es: ".$this->getImporte()."\n".
			"La fecha del vuelo es: ".$this->getFecha()."\n".
			"La cantidad de asientos totales del vuelo es: ".$this->getCantAsientosTot()."\n".
			"La cantidad de asientos disponisbles del vuelo es: ".$this->getCantAsientosDisp()."\n".
			"El responsable del vuelo es: ".$this->getObjResponsable()."\n");
	}

	/**************************************/
	/********* FUNCIONES PRIVADAS *********/
	/**************************************/





}

?>