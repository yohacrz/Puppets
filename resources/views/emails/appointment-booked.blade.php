{{-- resources/views/emails/appointment-booked.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Cita</title>
</head>
<body>
    <h1>¡Tu cita ha sido agendada!</h1>
    <p>Hola {{ $appointmentData['nombre'] }},</p>
    <p>Hemos recibido tu solicitud de cita y la confirmamos a continuación.</p>
    
    <p><strong>Detalles de la Cita:</strong></p>
    <ul>
        <li><strong>Tipo de Mascota:</strong> {{ $appointmentData['mascota'] }}</li>
        <li><strong>Fecha:</strong> {{ $appointmentData['fecha'] }}</li>
        <li><strong>Hora:</strong> {{ $appointmentData['hora'] }}</li>
        @if (!empty($appointmentData['mensaje']))
            <li><strong>Mensaje Especial:</strong> {{ $appointmentData['mensaje'] }}</li>
        @endif
    </ul>

    <p>Te esperamos en Puppets Grooming. Si necesitas cancelar o reprogramar, por favor, contáctanos.</p>
    <p>¡Gracias por confiar en nosotros!</p>
</body>
</html>