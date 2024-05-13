<?php

namespace App\Mail;

use App\Models\Consulta;
use Barryvdh\DomPDF\PDF;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CitaCreada extends Mailable
{
    use Queueable, SerializesModels;

    public $consulta;

    /**
     * Create a new message instance.
     */
    public function __construct(Consulta $consulta)
    {
        $this->consulta = $consulta;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $medicoEmail = $this->consulta->medico->user->email;

        return new Envelope(
            subject: 'Clínica VOLLMED',
            replyTo: $medicoEmail
        );
    }
    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.cita.creada',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments()
    {
        return [];
    }
}
