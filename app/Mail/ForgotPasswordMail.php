<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Customer;

class ForgotPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $customer;
    protected $link;

    public function __construct(Customer $customer, $link)
    {
        //
        $this->customer = $customer;
        $this->link = $link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Perbaharui Password Anda')
            ->view('emails.forgotpassword')
            ->with([
                'customer' => $this->customer,
                'link' => $this->link
            ]);
    }
}
