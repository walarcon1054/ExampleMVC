<?php
 
class Service {
    
    private $servicio;
	private $cuenta;
    private $db;
	private $result;
	private $resdia;
 
    public function __construct() {
        $this->servicio = array();
        $this->db = new PDO('mysql:host=localhost;dbname=ejemplo_mvc', "root", "root");
    }
 
    private function setNames() {
        return $this->db->query("SET NAMES 'utf8'");
    }
	
	private function getNumber($placa) {
        $largo=strlen($placa);
		$ultnr=substr($placa,($largo-1),1);
		return $ultnr;
    }
	
	private function getDiasemana($fecha) {
	   
	   $array_dias['Sunday'] = "Domingo";
       $array_dias['Monday'] = "Lunes";
       $array_dias['Tuesday'] = "Martes";
       $array_dias['Wednesday'] = "Miercoles";
       $array_dias['Thursday'] = "Jueves";
       $array_dias['Friday'] = "Viernes";
       $array_dias['Saturday'] = "Sabado";
	   
       $diasem=$array_dias[date('l', strtotime($fecha))];
	   return $diasem;
	   
    }
 
    public function getServicios() {
 
        self::setNames();
        $sql = "SELECT id, dia, hrdesde, hrhasta, placa_ini, placa_fin FROM horario";
        foreach ($this->db->query($sql) as $res) {
            $this->servicio[] = $res;
        }
        return $this->servicio;
        $this->db = null;
    }
    
	private function verHorario($nropla, $resdia, $hora) {
	   
	   $sql = "SELECT COUNT(*) as cuenta FROM horario WHERE dia='$resdia' AND (placa_ini='$nropla' OR placa_fin='$nropla') AND ('$hora' BETWEEN hrdesde AND hrhasta)";
        foreach ($this->db->query($sql) as $res) {
            $this->cuenta[] = $res;
        }
		return $this->cuenta;
	   
    }
	
    public function verHabilitado($placa, $fecha, $hora) {
 
        $nropla=self::getNumber($placa);
		$resdia=self::getDiasemana($fecha);
		$resultado=self::verHorario($nropla, $resdia, $hora);
		
		for ($i = 0; $i < count($resultado); $i++) { $conteo=$resultado[$i]["cuenta"]; }
        if($conteo==0) { $respuesta="APTO PARA CIRCULAR" ;} else { $respuesta="NO APTO PARA CIRCULAR"; }
	
		return $respuesta;
    }
}
?>
