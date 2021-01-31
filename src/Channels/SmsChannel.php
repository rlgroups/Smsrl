<?php

namespace Rlgroups\Smsrl\Channels;

use Rlgroups\Smsrl\Services\Smsrl;
use Illuminate\Notifications\Notification;

class SmsChannel
{
    public function send ($notifiable, Notification $notification) {
        if (method_exists($notifiable, 'routeNotificationForSmsrl')) {
            $phone = $notifiable->routeNotificationForSmsrl();
        } else {
            $phone = null;
        }

        $message = method_exists($notification, 'toSmsrl')
        ? $notification->toSmsrl($notifiable)
        : '';

        if (!$message || !$phone) {
            return;
        }

        return Smsrl::send($phone, $message->toString());
    }
}
