<?php

require_once(__DIR__.'/../../models/Entity/Alumnos.php');
require_once(__DIR__.'/../../models/Dao/INT_Repository.php');

class Dao implements INT_REP {
    private $conexion;
    private $status;
    private $table = 'data_alumnos';
    public function __construct() {
        //incluir las dependencias
        echo '[INSTANCIANDO DAO]: Importando la configuración'."\n";
        require_once(__DIR__.'/../../config/config.php');
        if(is_bool($Conexion)){
         echo '[ERROR]: El repositorio no se pudo conectar con el servidor..'."\n";
         exit(1);
        }
        $this->conexion = $Conexion;
    }
    public function getAll(): array {
        $sql = "SELECT * FROM {$this->table}";
        $result = mysqli_query($this->conexion, $sql);
        if (!$result) {
            throw new Exception("Error executing query: " .
             mysqli_error($this->conexion));
        }
        $alumnos = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $alumnos[] = new Alumnos($row['Dni'],
            $row['Nombres'],
            $row['Apellidos'],
            $row['Modulo_1'],
            $row['Modulo_2'],
            $row['Modulo_3'],
            $row['Promedio']
        );
            
        }
        return $alumnos;
    }
    public function getByID($Name,$Apellidos): Alumnos|bool{
            $alumnos = null;
            echo '[INFO]: Obteniendo Información de la Entidad'."\n";
            echo '[INFO]: Indexando Parametros....'."\n";
            echo '[INFO]: Nombre :['.$Name.']'."\n";
            echo '[INFO]: Apellido:['.$Apellidos.']'."\n";
            echo '[INFO]: Validando Formato'."\n";
            if(preg_match("/^[A-ZÁÉÍÓÚÑa-záéíóúñ]+(?:\s[A-ZÁÉÍÓÚÑa-záéíóúñ]+)*$/",$Name)&& preg_match("/^[A-ZÁÉÍÓÚÑa-záéíóúñ]+(?:\s[A-ZÁÉÍÓÚÑa-záéíóúñ]+)*$/",$Apellidos) ){
                    echo '[INFO]:Formato de peticion valida'."\n";

                    try {
                        //code...
                        $call = "call FindByNameAndApellidos('{$Name}','{$Apellidos}')";
                        echo '[SQL-QUERY]:'.$call."\n";
                        $result = mysqli_query($this->conexion,$call);
                        echo '[INFO]: Llamando al servicio...'."\n";
                        if (!$result) {
                            # code..
                            echo '[WARNING]: No se ah reconocido la conexion o 
                            hubo un error en la llamada al servicio'."\n";
                            echo '[WARNING]:Detalle - ['.mysqli_error($this->conexion).']'."\n";
                            return false;
                        }
                        while ($row=mysqli_fetch_assoc($result)) {
                            # code..
                            if (!isset($row['Response'])) {
                                echo '[SUCCESS]:Se encontraron registros'."\n";
                                # code...
                                $alumnos = new Alumnos($row['Dni'],
                                $row['Nombres'],
                                $row['Apellidos'],
                                $row['Modulo_1'],
                                $row['Modulo_2'],
                                $row['Modulo_3'],
                                $row['Promedio']
                            );  
                            }else{
        
                                echo '[INFO]:No se encontron registros en el servidor,
                                 verifique el estado del recurso llamando Get_Response_Server()
                                  para obtener mas información'."\n";
                                  $this->status=$row['Response'];
                            $alumnos=false;
                            }
                           }
                           echo '[SUCCESS]:Solicitud Exitosa ,se encontro recurso solicitado'."\n";
                           return $alumnos;
                    } catch (\Throwable $mysqli_sql_exception) {

                        echo '[FATAL- ERROR]:Exception no Controlada por el flujo'."\n";
                        echo '[Detalle]:El Servidor encontro un error en la petición'."\n";
                        echo '[RESPONSE]:'.$mysqli_sql_exception->getMessage()."\n";
                        throw $mysqli_sql_exception;
                    }
                             
            }else{


                echo '[ERROR]:Los Datos ingresandos no cumplen con la especificación de su
                formato'."\n";
                $this->status='[Detalle Exception]:Los valores ingresados no cumplen con el formato requerido';
                return false; 
            }

    }
    public function insert(Alumnos $alumno): bool{

            return false;
    }
    public function update(Alumnos $alumno): bool{
            return false;
    }
    public function delete($id): bool{

        return false;
    }
    public function Get_Response_Server():string{
        return $this->status;

    }
    public function SET_Response_Server(){

    } 


}

?>