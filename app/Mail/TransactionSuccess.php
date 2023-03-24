<?php

namespace App\Mail;

use App\Models\TravelPackage;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TransactionSuccess extends Mailable
{
    use Queueable, SerializesModels;

    public $transaction;
    public $travel_package;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($transaction, $travel_package, $user)
    {
        $this->transaction = $transaction;
        $this->travel_package = $travel_package;
        $this->user = $user;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Transaction Success',
        );
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Transaction Success')
            ->view('emails.transaction_success')
            ->with(['transaction' => $this->transaction]);
    }
}
