<?php
class Alumnos{
    private $DNI;
    private $Nombres;
    private $Apellidos;
    private $Modulo_1;
    private $Modulo_2;
    private $Modulo_3;
    private $Modulo_4;
    private $Modulo_5;

    private $Promedio;
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

    public function getPromedio(){
        return $this->Promedio;
    }
    public function setPromedio($promedio){
        $this->Promedio=$promedio;
    }
    public function getModulo_4(){
        return $this->Modulo_4;
    }
    public function setModulo_4($Modulo_4){
        $this->Modulo_4 = $Modulo_4;
    }
    public function getModulo_5(){
        return $this->Modulo_5;
    }
    public function setModulo_5($Modulo_5){
        $this->Modulo_5 = $Modulo_5;
    }
    //constructor
    public function __construct($DNI, $Nombres, $Apellidos, $Modulo_1, $Modulo_2, $Modulo_3,$Promedio){
        $this->DNI = $DNI;
        $this->Nombres = $Nombres;
        $this->Apellidos = $Apellidos;
        $this->Modulo_1 = $Modulo_1;
        $this->Modulo_2 = $Modulo_2;
        $this->Modulo_3 = $Modulo_3;
        $this->Promedio=$Promedio;
    }




}

?>

