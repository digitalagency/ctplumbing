<?php

namespace App\Modules\Customer\EmailVerification;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Mail;

use App\Modules\Customer\Mail\EmailVerification;

class SendVerificationEmail implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public $customer;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($customer)
    {
        $this->customer = $customer;
   	 try {
           
            $data = ["email_token"=>$this->customer->email_token];

            Mail::send('mail.email', $data, function ($message) {
                $message->from('kulchan.pankaj@gmail.com', 'nepal');
                $message->to($this->customer->email)
                ->subject("Email verification");
            });

        } catch (\Exception $e) {
            $this->failed($e);
        }

    }

    /**
     * Execute the job.
     * to create an instance of email verification template
     * that is passed to Mail for sending off the email to a user.
     * @return void
     */
    public function handle()
    {
       
        try {
           
            $data = ["email_token"=>$this->customer->email_token];

            Mail::send('mail.email', $data, function ($message) {
                $message->from('kulchan.pankaj@gmail.com', 'nepal');
                $message->to($this->customer->email)
                ->subject("Email verification");
            });

        } catch (\Exception $e) {
            $this->failed($e);
        }
    }
   


    public function failed(\Exception $e)
    {
    }
}
