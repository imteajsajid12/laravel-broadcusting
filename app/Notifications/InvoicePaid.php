<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;


class InvoicePaid extends Notification implements ShouldQueue
{
    use Queueable;
    public $user;
    public $messege;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($messege)
    {
        $this->messege = $messege;
    }
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->from('imteajsajid1@gmail.com', 'mail fasion')

        ->line('The introduction to the notification.')
        // ->line('Dear '.$this->user->name)
       ->action('Action your account', url('/'))
       ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
           'messege' =>$this->messege." Was login now",

        ];
    }

}

