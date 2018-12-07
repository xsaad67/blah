<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendWelcomeEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $title="nothing";
        $content="nothing";

        \Mail::send('mail.create-user', ['title' => $title, 'content' => $content], function ($message)
        {

            $message->from('me@gmail.com', 'Christian Nwamba');

            $message->to('saadsuri67@gmail.com');


        // $stream = imap_open("{imap.gmail.com:993/imap/ssl/novalidate-cert/norsh}[Gmail]/Sent Mail", "saadsuri67@gmail.com", "helloworld()",NULL,1)or die('Cannot connect to Gmail: ' . print_r(imap_errors()));

        // $folder = "{imap.gmail.com:993/imap/ssl/novalidate-cert/norsh}[Gmail]/Sent Mail";
    

        // imap_append($stream, $folder, $message->toString());

        // imap_close($stream);


        });
        
    }
}
