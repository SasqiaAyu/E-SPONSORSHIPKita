<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Proposal;
use Illuminate\Support\Facades\Crypt;

class ApproveEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Proposal $proposal)
    {
        $this->proposal = $proposal;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.approve',[
            'content' => 'selamat proposal anda telah di acc oleh perusahaan '.$this->proposal->company->user->nama,
            'name' => $this->proposal->student->user->nama,
        ]);
    }
}
