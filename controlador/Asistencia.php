<?php
require_once "../admin/config/global.php";
date_default_timezone_set(ZONA_HORARIA); // Asegúrate de que ZONA_HORARIA está definida en global.php
require_once "../modelos/Asistencia.php";

$asistencia = new Asistencia();
$fecha = date("Y-m-d");
$hora = date("H:i:s");

switch ($_GET['op']) {
    case 'registrar':
        $codigo_persona = $_REQUEST['codigo'];
        
        // Verificamos si la persona con el código existe
        $persona = $asistencia->verificarcodigo_persona($codigo_persona);
        
        if ($persona) {
            // Buscamos la última asistencia registrada en el día actual
            $asistencia_actual = $asistencia->buscar_asistencia($codigo_persona, $fecha);
            
            if (empty($asistencia_actual)) {
                // Si no hay registro previo, registramos una "Entrada"
                $tipo = 'Entrada';
            } else {
                // Si ya existe un registro, verificamos el tipo y alternamos entre "Entrada" y "Salida"
                $tipo = $asistencia_actual['tipo'] == 'Entrada' ? 'Salida' : 'Entrada';
            }
            
            // Registramos la nueva asistencia
            $rspta = $asistencia->registrar_entrada($codigo_persona, $tipo);
            
            // Imprimimos el resultado
            echo $rspta ? $tipo . ' registrada correctamente' : 'No se pudo registrar la ' . $tipo;
            
        } else {
            echo 'No hay empleado registrado con este código';
        }
        break;

    default:
        echo 'Operación no válida';
        break;
}
?>
