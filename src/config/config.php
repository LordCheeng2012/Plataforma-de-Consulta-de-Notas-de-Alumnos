<?php
// filepath: c:\Herramientas de Estudios\Proyectos_Desarrollo De Software\Backend-Servidor\Php\Php-Proyectos\Proyectos_Remotos\Plataforma  de Consulta de [config.php](http://_vscodecontentref_/11)
    $Conexion = false;
if (file_exists(__DIR__ . '/../../vendor/autoload.php')) {
    require_once __DIR__ . '/../../vendor/autoload.php'; 
    echo "Se encontró autoload.\n";
    try {
        Dotenv\Dotenv::createUnsafeImmutable(__DIR__.'/../../')->load();
        echo "Archivo .env cargado correctamente.\n";
    } catch (Exception $e) {
        echo "Error al cargar el archivo .env: " . $e->getMessage() . "\n";
        exit(1);
    }

    $dbHost = getenv('DB_HOST')?: "Desconocido";
    $dbName = getenv('DB_DATABASE')?: "Desconocido";
    $dbUser = getenv('DB_USERNAME')?: "Desconocido";
    $dbPass = getenv('DB_PASSWORD')?: "";
    $dbPort = getenv('DB_PORT') ?: 3306;
    $Autor = getenv('CREATOR') ?: "Desconocido";
    $Version = getenv('VERSION') ?: "1.0.0";
    $AppName = getenv('APP_NAME') ?: "Desconocido";

    $data = array($dbHost,$dbName, $dbUser,$dbPass, $dbPort,$Autor,$Version,$AppName);
    echo "Conectando a la base de datos $dbName en $dbHost:$dbPort con usuario $dbUser\n";
    try {
        //code...
            echo '[INFO]: Accediendo a las variables de Entorno..'."\n";
            echo '[Leyendo Datos]-------'."\n";
            foreach($data as $item){
            
                if($item=='Desconocido'){
                    echo '[Warning] : Algunas Variables de Entorno no han sido reconocidas o no existen'."\n";
                }
                echo '[INFO] : '.$item."\n";
            }
            echo '-----Finalize Parameters----'."\n";
            echo '[INFO] : Extableciendo Conexion con MySQL'."\n";
            $Conexion = new mysqli($dbHost,
            $dbUser,$dbPass,
            $dbName);
              if(!$Conexion){
                die("Connection failed: " . mysqli_connect_error());
            }

        echo '[SUCCESS]:¡Conexion a BD exitosa!'."\n";
        echo '[SUCCESS]: Conectado a : '.$dbName."\n";
        echo '[SUCCESS]: Puede Utilizar la conexion..'."\n";

    } catch (\Throwable $th) {
        echo "[Error] : ocurrio un error en la conexion a BD ". "\n";
        echo $th->getMessage();
        throw $th;
    }
} else {
    echo "No se encontró autoload.\n";
    exit(1);
}