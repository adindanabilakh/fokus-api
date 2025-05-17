<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UMKMRegistered extends Mailable
{
    use Queueable, SerializesModels;

    public $umkm;

    public function __construct($umkm)
    {
        $this->umkm = $umkm;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Registrasi UMKM Berhasil',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.umkm-registered',
            with: [
                'umkm' => $this->umkm,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
