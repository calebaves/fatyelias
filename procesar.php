<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Recoger los datos del formulario
    $nombre = strip_tags(trim($_POST["nombre"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $mensaje = htmlspecialchars(trim($_POST["mensaje"]));

    // 2. Configuración del correo
    $destinatario = "faty.elias2017@gmail.com"; // CAMBIA ESTO
    $asunto = "Nuevo mensaje de contacto de $nombre";

    // 3. Construcción del cuerpo del correo
    $contenido = "Has recibido un nuevo mensaje desde tu sitio web:\n\n";
    $contenido .= "Nombre: $nombre\n";
    $contenido .= "Correo: $email\n";
    $contenido .= "Correo: $cantidad\n";  
    $contenido .= "Correo: $asistencia\n"; 
    $contenido .= "Mensaje:\n$observaciones\n";

    // 4. Encabezados (Importante para que no llegue a SPAM)
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // 5. Envío y validación
    if (mail($destinatario, $asunto, $contenido, $headers)) {
        echo "¡Gracias! Tu mensaje ha sido enviado correctamente.";
    } else {
        echo "Lo sentimos, hubo un error al enviar el mensaje.";
    }
} else {
    echo "Acceso no permitido.";
}
?>
