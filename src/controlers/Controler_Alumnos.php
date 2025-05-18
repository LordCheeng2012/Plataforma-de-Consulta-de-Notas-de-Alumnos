
<?php
  //obviar los logs de salida en consola
  ob_start();
require_once __DIR__.'/../service/impl/IMP_SERV.php';

if (isset( $_GET['Code'])) {
    # code...
    $Nombre = trim($_GET['Code']);
   
    GET_Register($Nombre);
}else{
    //header("content-type:application/json");
    http_response_code(500);
    echo json_encode(["[SERVER]"=>"No se reconocieron los parametros de entrada al servicio"]);
}


  function GET_Register($Name){

    $HTTP_CODE=400;
    $SERVICE = new SERVICIO();
    if ($Name <>'') {
        # code...

      
    $register = $SERVICE->GET_AlumnByNameAndApellidos($Name);

    //finalizar los logs
    ob_get_clean();
    if(is_string($register)){

        $HTTP_CODE=204;
           
    }else{

        if ($register->getPromedio()=="") {
            $response=[
                "NOMBRE"=>$register->getNombres(),
                "APELLIDOS"=>$register->getApellidos(),
                "MODULO_1"=>$register->getModulo_1(),
                "MODULO_2"=>$register->getModulo_2(),
                "MODULO_3"=>$register->getModulo_3(),
            ];
        }
        $HTTP_CODE=200;
        $response=[
            "NOMBRE"=>$register->getNombres(),
            "APELLIDOS"=>$register->getApellidos(),
            "MODULO_1"=>$register->getModulo_1(),
            "MODULO_2"=>$register->getModulo_2(),
            "MODULO_3"=>$register->getModulo_3(),
            "Promedio"=>$register->getPromedio()
        ];
        


    }
   
}else{
    $HTTP_CODE=400;
    $response=[
        "Response"=>"Argumentos Vacios"
    ];
}

    //header("content-type:application/json");
    http_response_code($HTTP_CODE);
    echo json_encode($response);
}


?>
