<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AppointmentBooked extends Mailable
{
    use Queueable, SerializesModels;

    public $appointmentData;

    /**
     * Crea una nueva instancia del mensaje.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->appointmentData = $data;
    }

    /**
     * Obtiene el sobre del mensaje.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Confirmación de Cita - Puppets Grooming',
        );
    }

    /**
     * Obtiene la definición del contenido del mensaje.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.appointment-booked',
        );
    }

    /**
     * Obtiene los archivos adjuntos para el mensaje.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}