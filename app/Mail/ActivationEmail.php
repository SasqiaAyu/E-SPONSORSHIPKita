<?php

namespace App\Mail;

use App\Parameter;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\User;
use Illuminate\Support\Facades\Crypt;

class ActivationEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $id = Crypt::encryptString($this->user->id);
        return $this->view('email.company',[
            'user' => $this->user,
            'url' => route('verifyCompany',$id),
            'nilai' => Parameter::where('kode','nilaiPendaftaranCompany')->first()->nilai
        ]);
    }
}
