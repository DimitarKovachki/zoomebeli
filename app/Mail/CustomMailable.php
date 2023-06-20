<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request , $riserve_type)
    {
        $this->request = $request;
        $this->riserve_type = $riserve_type;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->riserve_type == 'user') {
            $return =  $this->subject('Поръчкови')->view('mails.custom_user', ['request' => $this->request]);
        } else {
            $return =  $this->subject('Поръчкови')->view('mails.custom_admin', ['request' => $this->request]);
            foreach ($this->request->file('image', []) as $key => $image) {
                $return->attach($image->getRealPath(), [
                    'as' => $image->getClientOriginalName(),
                    'mime' => $image->getClientMimeType(),
                ]);
            }
        }

        return $return;
    }
}
