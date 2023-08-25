<?php

namespace App\Mail;

use App\Models\Registration;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;


class ApplicationAccepted extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The registration instance.
     *
     * @var \App\Models\Registration
     */
    public $registration;
    public $file;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Registration $registration, $file)
    {
        $this->registration = $registration;
        $this->file = $file;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $location = public_path("/storage/") . $this->file;
        return $this->markdown('emails.applications.accepted')->attach($location);
    }
}
