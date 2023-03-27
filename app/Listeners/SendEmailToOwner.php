<?php

namespace App\Listeners;

use App\Events\SurveySubmittedEvent;
use App\Mail\SurveySubmittedMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailToOwner
{
    /**
     * Create the event listener.
     */
   
    public function __construct()
    {
    }

    /**
     * Handle the event.
     */
    public function handle(SurveySubmittedEvent $event): void
    {
        $ownerEmail  = $event->data['owner']->email;
        $mailData = [
            'survey' => $event->data['survey'],
            'owner' =>  $event->data['owner']
        ];

        Mail::to($ownerEmail)->send(new SurveySubmittedMail($mailData));
    }
}
