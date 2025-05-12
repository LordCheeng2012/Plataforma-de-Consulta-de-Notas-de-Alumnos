<?php

require_once __DIR__.'/interfaces/INT_SERV.php';
require_once __DIR__.'/../../models/Dao/IMP_Repository.php';
class SERVICIO implements INT_SERV{
    private $RepoDao;
    public function __construct(){
        echo '[INSTANCIANDO]:Servicio'."\n";
        echo '[INSTANCIANDO]:Agregando Dependencias'."\n";
        $this->RepoDao= new Dao();
    }
    public function GET_AlumnByNameAndApellidos($Name,$Apellido):Alumnos|string{
        echo '[INFO]:En Servicio'."\n";
        echo '[INSPECTION]:Parametros Extraidos---'."\n";
          
            # code...
            echo '[PARAMETER]->NAME:'.$Name."\n";
            echo '[PARAMETER]->NAME:'.$Apellido."\n";
        echo '[Enviando Información].......';    
        $Alumno=$this->RepoDao->getByID($Name,$Apellido);

        if (is_bool($Alumno)) {
            # code...
            echo '[Warning]:No se logro obtener el recurso solicitado'."\n";
            return $this->RepoDao->Get_Response_Server();
        }
        echo '[SUCCESS]: Se ah completado la operación';
        return  $Alumno;



    }

} 


?>