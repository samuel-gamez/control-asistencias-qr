var scanner = new Instascan.Scanner({
    continuous: true, // Escanea continuamente
    video: document.getElementById('preview'), // Elemento de video donde se muestra la vista previa
    mirror: false, // No se refleja la imagen en el escaneo
    captureImage: false, // No se captura la imagen
    backgroundScan: false, // No se escanea en segundo plano
    refractoryPeriod: 5000, // Periodo refractario de 5 segundos
    scanPeriod: 5 // Periodo de escaneo de 5 milisegundos
});

// Evento "scan" que se activa cuando se escanea un código
scanner.addListener('scan', function(content) {
    // Realiza una solicitud POST al script PHP para registrar la asistencia con el código escaneado
    $.post("../controlador/Asistencia.php?op=registrar", {"codigo": content}, function(data) {
        // Muestra una notificación utilizando SweetAlert según el resultado de la operación
        Swal.fire({
            title: 'Asistencia',
            text: data,
            icon: data.includes("registrado") ? 'success' : 'error' // Verifica si la respuesta contiene la palabra "registrado"
        });
    }).fail(function() {
        // Muestra una alerta de error si la solicitud falla
        Swal.fire({
            title: 'Error',
            text: 'Hubo un problema al registrar la asistencia.',
            icon: 'error'
        });
    });
});
// Función para iniciar la cámara y comenzar a escanear códigos QR
function iniciaCamara() {
    // Obtiene las cámaras disponibles y comienza a escanear utilizando la última cámara encontrada
    Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
            scanner.start(cameras[cameras.length - 1]);
        } else {
            alert('No se encontró una cámara disponible');
            console.error('No se encontró una cámara disponible.');
        }
    }).catch(function (e) {
        console.error(e);
    });
}

// Función para detener el escaneo y apagar la cámara
function apagaCamara() {
    scanner.stop();
}

