<?php

namespace Reflex\DiscordNotifications;

use Reflex\DiscordNotifications\Exceptions\CouldNotSendNotification;
use Reflex\DiscordNotifications\Events\MessageWasSent;
use Reflex\DiscordNotifications\Events\SendingMessage;
use Illuminate\Notifications\Notification;

class DiscordChannel
{
    public function __construct()
    {
        // Initialisation code here
    }

    /**
     * Send the given notification.
     *
     * @param mixed $notifiable
     * @param \Illuminate\Notifications\Notification $notification
     *
     * @throws \Reflex\DiscordNotifications\Exceptions\CouldNotSendNotification
     */
    public function send($notifiable, Notification $notification)
    {
        $shouldSendMessage = event(new SendingMessage($notifiable, $notification), [], true) !== false;

        if (! $shouldSendMessage) {
            return;
        }

        //$response = [a call to the api of your notification send]

//        if ($response->error) { // replace this by the code need to check for errors
//            throw CouldNotSendNotification::serviceRespondedWithAnError($response);
//        }

        event(new MessageWasSent($notifiable, $notification));
    }
}
