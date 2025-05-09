<?php
class Alumnos{
    private $DNI;
    private $Nombres;
    private $Apellidos;
    private $Modulo_1;
    private $Modulo_2;
    private $Modulo_3;
    //getters y setters
    public function getDNI(){
        return $this->DNI;
    }
    public function setDNI($DNI){
        $this->DNI = $DNI;
    }
    public function getNombres(){
        return $this->Nombres;
    }
    public function setNombres($Nombres){
        $this->Nombres = $Nombres;
    }
    public function getApellidos(){
        return $this->Apellidos;
    }
    public function setApellidos($Apellidos){
        $this->Apellidos = $Apellidos;
    }
    public function getModulo_1(){
        return $this->Modulo_1;
    }
    public function setModulo_1($Modulo_1){
        $this->Modulo_1 = $Modulo_1;
    }
    public function getModulo_2(){
        return $this->Modulo_2;
    }
    public function setModulo_2($Modulo_2){
        $this->Modulo_2 = $Modulo_2;
    }
    public function getModulo_3(){
        return $this->Modulo_3;
    }
    public function setModulo_3($Modulo_3){
        $this->Modulo_3 = $Modulo_3;
    }
    //constructor
    public function __construct($DNI, $Nombres, $Apellidos, $Modulo_1, $Modulo_2, $Modulo_3){
        $this->DNI = $DNI;
        $this->Nombres = $Nombres;
        $this->Apellidos = $Apellidos;
        $this->Modulo_1 = $Modulo_1;
        $this->Modulo_2 = $Modulo_2;
        $this->Modulo_3 = $Modulo_3;
    }




}

?>

