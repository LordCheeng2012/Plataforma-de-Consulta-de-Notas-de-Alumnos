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
  
    if (is_numeric("78")) {
        # code...
        echo "Numero";
    }else{
        echo "Cadena";
    }

    }

}
    //ejecucion del script
    $Runner = new Runner();
    $Runner->Run();


?>