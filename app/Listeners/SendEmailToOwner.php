<?php

namespace App\Listeners;

use App\Mail\SurveySubmittedMail;
use Illuminate\Support\Facades\Log;
use App\Events\SurveySubmittedEvent;
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
        try {
            $ownerEmail  = $event->data['owner']->email;
            $mailData = [
                'survey' => $event->data['survey'],
                'owner' =>  $event->data['owner'],
                'answers' =>  $event->data['answers'],
            ];
        
            Mail::to($ownerEmail)->send(new SurveySubmittedMail($mailData));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
