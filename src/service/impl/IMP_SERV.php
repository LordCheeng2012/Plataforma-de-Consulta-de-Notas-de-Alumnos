<?php
ob_start();
require_once __DIR__.'/interfaces/INT_SERV.php';
require_once __DIR__.'/../../models/Dao/IMP_Repository.php';
require_once __DIR__.'/../../models/Entity/Messages.php';
ob_end_clean();
class SERVICIO implements INT_SERV{
    private $RepoDao;
    private $ResponseMessage;
    private $status;
    public function __construct(){
        //echo '[INSTANCIANDO]:Servicio'."\n";
        //echo '[INSTANCIANDO]:Agregando Dependencias'."\n";
        $this->RepoDao= new Dao();
        $this->ResponseMessage= new MessageHandler();
    }
    public function GET_AlumnByNameAndApellidos($Code):Alumnos|string{
        //echo '[INFO]:En Servicio'."\n";
        //echo '[INSPECTION]:Parametros Extraidos---'."\n";
          
            # code...
            //echo '[PARAMETER]->CODE:'.$Code."\n";
            //echo '[PARAMETER]->NAME:'.$Apellido."\n";
        //echo '[Enviando Información].......';    
        $Alumno=$this->RepoDao->getByID($Code);

        if (is_bool($Alumno)) {
            # code...
            echo '[Warning]:No se logro obtener el recurso solicitado'."\n";
            return '[Warning]:No se logro obtener el recurso solicitado'."\n";
        }
        echo '[SUCCESS]: Se ah completado la operación';
        return  $Alumno;



    }
    public function SET_ImportAumns($Excel):MessageHandler{
       
        $message=null;
        $type=null;
        $status = null;
        $data =null;

        $date = $this->RepoDao->ImportAlumns($Excel);
        $response = $date->getMessages();
        if ($response[0]['Status']) {         
            //llamar a metodo a registrar a bd
            $sql =$this->RepoDao->FormatedQuery($response[0]['Data']);
            //ejecutar la consulta 
            $resultado = $this->RepoDao->SaveAlumns($sql);
            if ($resultado) {
                # code...
                $message="Se han actualizado todos  los registros";
                $type="SUCCESS";
                $status = true;
                $data=$response[0]['message'];
                        
            }else{
                $message="[ERROR]:No se pudo guardar los registros";
                $type="ERROR";
                $status = false;
            }
        
        }else{
        $this->ResponseMessage=$date;
        }
             $this->ResponseMessage->addMessage($type,$message,$data,$status);
             return $this->ResponseMessage;
        }
        


} 


?>