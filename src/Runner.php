<?php
echo '[Ejecutando Proyecto]['."\n";
echo "[INFO]:Iniciando Runner de prueba"."\n";
echo "\n";
echo "\n";
echo "\n";
echo "\n";
echo "\n";
 echo '[START]=> [Iniciando Aplicación...]'."\n";
 echo '[INFO]=> [ULTIMATE-2012]'."\n";
 echo "\n";
 echo "[INFO]:Arranca Exitoso "."\n";
 echo "\n";
 echo "\n";
 echo "\n";
 echo "\n";
 echo ']'."\n";
class Runner {
    public $Endpoint;

public function __construct(){

//ejecute este script par depurar y probar metodos del servicio
require_once __DIR__.'/service/impl/IMP_SERV.php';
$this->Endpoint= new SERVICIO();

} 
public function Run(){
//llame o ejecute aqui sus metodos o instancias de clase 
   
    $res=$this->Endpoint->GET_AlumnByNameAndApellidos("Isabel Maria","Sánchez");
    if (is_string($res)) {
        # code...
        echo '[INFO]:Metodo ejecutado correctamente'."\n";
        echo '[RESULTADO]:'.$res."\n";
    }else{

        echo '[INFO]:Metodo ejecutado correctamente'."\n";
        echo '[Detalles]:['."\n";
        echo '[ALUMNO]:'.$res->getNombres()." ".$res->getApellidos()."\n";
        echo 'MODULO 1: '.$res->getModulo_1()."\n";
        echo 'MODULO 1: '.$res->getModulo_2()."\n";
        echo 'MODULO 1: '.$res->getModulo_3()."\n";
        echo 'Promedio: '.$res->getPromedio()."\n";
        echo ']'."\n";



    }

}

}
    //ejecucion del script
    $Runner = new Runner();
    $Runner->Run();


?>