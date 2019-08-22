<?php

namespace App\Modules\Customer\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Modules\Customer\Models\Customer;

class EmailVerification extends Mailable
{
    use Queueable, SerializesModels;


    protected $customer;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($customer)
    {
        
        $this->customer = $customer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->view("mail.email")
        ->from(env('MAIL_USERNAME'),'Email Verification')
        ->subject('Mail verification for ct-plumbing account')
        ->with([

            "email_token" => $this->customer->email_token,
            
            ]);
    }
}
