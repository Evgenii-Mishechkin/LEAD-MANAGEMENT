<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailNotification;
use Illuminate\Notifications\Messages\MailMessage;

class CustomVerifyEmail extends VerifyEmailNotification
{
    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $verificationUrl = $this->verificationUrl($notifiable);

        return (new MailMessage)
            ->subject('Подтверждение Email Адреса')
            ->greeting('Здравствуйте!')
            ->line('Пожалуйста, нажмите на кнопку ниже, чтобы подтвердить ваш email адрес.')
            ->action('Подтвердить Email', $verificationUrl)
            ->line('Если вы не создавали учетную запись, никаких действий не требуется.')
            ->salutation('С уважением, команда ' . config('app.name'))
            ->markdown('emails.verify-email', ['url' => $verificationUrl]);
    }
}
