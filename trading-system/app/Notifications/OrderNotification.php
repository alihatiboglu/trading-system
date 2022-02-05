<?php

namespace App\Notifications;

use App\Models\Course;
use App\Models\Country;
use App\Models\Order;
use App\Models\User;
use App\Models\Post;
use App\Models\Package;
use App\Models\TypeAccount;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderNotification extends Notification
{
    use Queueable;
    protected $order;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Order $order) {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        $course = Course::find($this->order->course_id);
        $course_text = $course->name ?? '';

        $country = Country::where('calling_code','LIKE', $this->order->calling_code)->first();
        $country_text = $country->name ?? '';

        //dd($this->order);

        return (new MailMessage)
                    ->subject('New Course order')
                    ->line('Course:'.$course_text)
                    ->line('Client name: '.$this->order->name)
                    ->line('Nickname: '.$this->order->nickname)
                    ->line('Email: '.$this->order->email)
                    ->line('Country: '.$country_text)
                    ->line('Phone: '.$this->order->calling_code . $this->order->phone)
                    ->action('Notification Action', url('/'))
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
            //
        ];
    }
}
