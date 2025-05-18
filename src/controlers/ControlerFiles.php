<?php 

use PhpOffice\PhpSpreadsheet\IOFactory;
// obviar los logs de salida en consola
ob_start();
require_once __DIR__.'/../service/impl/IMP_SERV.php';
ob_end_clean();

$ser = new SERVICIO();
$message = ""; // Variable para almacenar el mensaje del servidor

if (isset($_POST['btnCargar'])) {
    if ($_FILES['itpFile']['type'] === 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
        $archivo = $_FILES['itpFile']['tmp_name'];
        ob_start();
        $data = $ser->SET_ImportAumns($archivo);
        ob_end_clean();
        $message = "<div class='success'>TIPO: <strong>" . htmlspecialchars($data->getMessages()[0]['type']) . "</strong><br>" .
                   "MENSAJE: <strong>" . htmlspecialchars($data->getMessages()[0]['message']) . "</strong><br>" .
                   "MENSAJE: <strong>" . htmlspecialchars($data->getMessages()[0]['Data']) . "</strong><br>" .
                   "ESTADO: <strong>" . htmlspecialchars($data->getMessages()[0]['Status']) . "</strong><br>" .
                   "HORA: <strong>" . htmlspecialchars($data->getMessages()[0]['timestamp']) . "</strong></div>";
    } else {
        $message = "<div class='error'>Error: No es un archivo Excel válido. Tipo recibido: <strong>" . htmlspecialchars($_FILES['itpFile']['type']) . "</strong></div>";
    }
} else {
    $message = "<div class='alert'>Error: No se recibió ningún archivo.</div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public_html/ControlerFiles.css">
    <title>Resultado de la Carga</title>
</head>
<body>
    <div class="window">
        <div class="title-bar">
            <span>Resultado de la Carga</span>
        </div>
        <div class="content">
            <div class="message">
                <?php echo $message; ?>
            </div>
            <a href="../../public_html/ImportarArchivos.html" class="btn">Volver</a>
        </div>
        <div class="footer">
            <span>Powered by ULTIMATE 2012</span>
        </div>
    </div>
</body>
</html>