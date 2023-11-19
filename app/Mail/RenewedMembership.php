<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RenewedMembership extends Mailable
{
    use Queueable, SerializesModels;
    protected User $user;


    /**
     * Create a new message instance.
     */
    public function __construct(User $user)
    {
        // Cargar explícitamente la relación many-to-many con la tabla pivote
        $this->user = $user->load('memberships');
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Membresia renovada',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $membershipInfo = $this->user->memberships;

        return new Content(
            view: 'emails.renewed-membership',
            with: [
                'name' => $this->user->name,
                'email' => $this->user->email,
                'code' => $this->user->code,
                'membershipInfo' => $membershipInfo
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
