<?php


use PhpOffice\PhpSpreadsheet\IOFactory;
ob_start();
require_once(__DIR__.'/../../../vendor/autoload.php');
require_once(__DIR__.'/../../models/Entity/Alumnos.php');
require_once(__DIR__.'/../../models/Dao/INT_Repository.php');
require_once( __DIR__.'/../../models/Entity/Messages.php');
ob_end_clean();

class Dao implements INT_REP {
    private mysqli $conexion;
    private $status;

     private $response ;
    private string $table = 'data_alumnos';
    public function __construct() {
        //incluir las dependencias
        //echo '[INSTANCIANDO DAO]: Importando la configuración'."\n";
        require_once(__DIR__.'/../../config/config.php');
        if(is_bool($Conexion)){
         echo '[ERROR]: El repositorio no se pudo conectar con el servidor..'."\n";
         exit(1);
        }
        $this->conexion = $Conexion;
        $this->response= new MessageHandler();
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
    public function getByID($Code): Alumnos|bool{
            $alumnos = null;
            echo '[INFO]: Obteniendo Información de la Entidad'."\n";
            echo '[INFO]: Indexando Parametros....'."\n";
            echo '[INFO]: CODE :['.$Code.']'."\n";
            //echo '[INFO]: Apellido:['.$Apellidos.']'."\n";
            echo '[INFO]: Validando Formato'."\n";
            if(preg_match("/^[A-Za-zA-ZÁÉÍÓÚÑa-záéíóúñ0-9\s]+$/",$Code) ){
                    echo '[INFO]:Formato de peticion valida'."\n";

                    try {
                        //code...
                        $call = "call FindByNameAndApellidos('{$Code}')";
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
    
    
  
    public function getStatus(): string {
        return $this->status;
    }
    public function setStatus(string $status): void {
        $this->status = $status;
    }
    
    
    public function ImportAlumns(string $Excel):MessageHandler{
        
        $Data =[];
        $Type ="Warning";
        $status =true;
        try {
            //code...
            $doc = IOFactory::load($Excel);
            $HojaExcel = $doc->getSheet(0);
            $total = $HojaExcel->getHighestDataRow();
            $Info="[INFO]:Obteniendo Datos <br>";
            for ($fila=2; $fila<= $total; $fila++) {
               
                $Nombre = $HojaExcel->getCell('A'.$fila)->getValue();
                $Apellidos = $HojaExcel->getCell('B'.$fila)->getValue();
                if (is_numeric($HojaExcel->getCell('C'.$fila)->getValue())) {
                    $User = $HojaExcel->getCell('C'.$fila)->getValue();
                   
                }else{
                    $User = rand(500,2600);
                    $Info ="Se han remplazado algunos identificadores ,
                    ya que no tenian el formato esperado ";                    
                }
                $N1 = $HojaExcel->getCell('D'.$fila)->getValue()?:"-";
                $N2 = $HojaExcel->getCell('E'.$fila)->getValue()?:"-";
                $N3 = $HojaExcel->getCell('F'.$fila)->getValue()?:"-";
                $N4 = $HojaExcel->getCell('G'.$fila)->getValue()?:"-";
                $Promedio = $HojaExcel->getCell('H'.$fila)->getValue()?:"-";
                $row = [$User,$Nombre,$Apellidos,$N1,$N2,$N3,$N4,$Promedio];
                $Data[]=$row; 
             }
         
             $Type ="SUCCESS";
             $this->response->addMessage($Type,$Info,$Data,$status);
             return $this->response;
        } catch (\Throwable $th) {
            $Info .= "[ERROR]:No se pudo analizar el archivo proporcionado"."<br>";
            $Data = "[ERROR]:No se pudo realizar la peticion :".$th->getMessage();
            $Type="ERROR";
            $status=false;
            $this->response->addMessage($Type,$Info,$Data,$status);
            return $this->response;
        }
       
       
        
    }
    
    public function FormatedQuery(array $studentsArray):string {
        if (!is_array($studentsArray)) {
            # code...
            return "[ERROR]:Formato para creacion de consulta incorrecta - <br>";
         }else{
        try {
            
            echo "[INFO] : Actualizando registros al servidor <br>";
    $insertSQL = "INSERT INTO Data_Alumnos (
        Dni,
        Nombres, 
        Apellidos,
        Modulo_1,
        Modulo_2,
        Modulo_3,
        Modulo_4,
        Promedio
    ) VALUES ";

    echo "[INFO]: Recorriendo los registros del excel<br>";

    $rowCount = 0;
    foreach ($studentsArray as $studentData) {
        $rowCount++;
        $rowValues = "(";
        
        for ($i = 0; $i < count($studentData); $i++) {
          
            $rowValues .= $i == count($studentData)-1
                ? "'{$studentData[$i]}')" 
                : "'{$studentData[$i]}',";
        }

        $rowCount == count($studentsArray)
            ? $insertSQL .= $rowValues .";"
            : $insertSQL .= $rowValues.",";
    }
    return $insertSQL ;

        } catch (\Throwable $th) {

            echo $th->getMessage(); 
            throw $th;
        }
}
    }

    public function SaveAlumns($SqlInsert):bool{
        //PREPARAR LA CONSULTA
        $result="";
        try {

            if($this->conexion->query("TRUNCATE `db_management`.`data_alumnos`")){
                if($this->conexion->query($SqlInsert)){
                    $result= true;
               }else{
                   $result= false;
               };
            }else{

                return false;
            }
            
        } catch (\mysqli_sql_exception $th) {
            throw $th;
        }
        return $result;

    }
}


?>