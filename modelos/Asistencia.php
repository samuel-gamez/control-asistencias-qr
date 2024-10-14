<?php 
// Incluir la conexión de base de datos
require "../admin/config/Conexion.php";

class Asistencia {

    // Implementamos nuestro constructor
    public function __construct() {
        // Constructor vacío, pero podría ser útil para inicializar datos si fuera necesario
    }

    // Verifica el código de una persona en la tabla 'usuarios'
    public function verificarcodigo_persona($codigo_persona) {
        $sql = "SELECT * FROM usuarios WHERE codigo_persona='$codigo_persona'";
        return ejecutarConsultaSimpleFila($sql);
    }

    // Selecciona el código de la persona en la tabla 'asistencia'
    public function seleccionarcodigo_persona($codigo_persona) {
        $sql = "SELECT * FROM asistencia WHERE codigo_persona = '$codigo_persona'";
        return ejecutarConsulta($sql);
    }

    // Busca la asistencia de una persona en una fecha determinada
    public function buscar_asistencia($codigo_persona, $fecha) {
        $sql = "SELECT a.*, e.codigo FROM asistencia a 
                INNER JOIN empleados e ON a.codigo_persona = e.codigo 
                WHERE e.codigo = '$codigo_persona' AND a.fecha = '$fecha' 
                ORDER BY a.id DESC LIMIT 1";
        return ejecutarConsultaSimpleFila($sql);
    }

    // Registrar la entrada de una persona
    public function registrar_entrada($codigo_persona, $tipo) {
        date_default_timezone_set('America/Lima');
        $fecha = date("Y-m-d");
        $hora = date("H:i:s");
        $sql = "INSERT INTO asistencia (codigo_persona, tipo, fecha, hora) 
                VALUES ('$codigo_persona', '$tipo', '$fecha', '$hora')";
        return ejecutarConsulta($sql);
    }

    // Registrar la salida de una persona
    public function registrar_salida($codigo_persona, $tipo) {
        date_default_timezone_set('America/Lima');
        $fecha = date("Y-m-d");
        $hora = date("H:i:s");
        $sql = "INSERT INTO asistencia (codigo_persona, tipo, fecha, hora) 
                VALUES ('$codigo_persona', '$tipo', '$fecha', '$hora')";
        return ejecutarConsulta($sql);
    }

    // Listar todos los registros de asistencia
    public function listar() {
        $sql = "SELECT * FROM asistencia";
        return ejecutarConsulta($sql);
    }
}

?>
