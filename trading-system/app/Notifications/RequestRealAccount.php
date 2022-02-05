<?php

namespace App\Notifications;

use App\Models\Account;
use App\Models\Country;
use App\Models\User;
use App\Models\Post;
use App\Models\Package;
use App\Models\TypeAccount;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RequestRealAccount extends Notification
{
    use Queueable;
    protected $account;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Account $account) {
        $this->account = $account;
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
        $account  = 'Real Account';
        $package_text ='';
        if ($this->account->type == 'demo') {
            $account  = 'Demo Account';
        }elseif ($this->account->type == 'package') {
            $account = 'Wallet Account';
            $package = Package::find($this->account->package_id);
            $package_text = $package->name ?? '';
        } 
        $platform = Post::find($this->account->platform);
        $platform_text = $platform->name ?? '';

        $account_type = TypeAccount::find($this->account->account_type);
        $account_type_text = $account_type->name ?? '';

        $country = Country::where('calling_code','LIKE', $this->account->calling_code)->first();
        $country_text = $country->name ?? '';

        return (new MailMessage)
                    ->subject('Request new ' .$account)
                    ->line('Account:'.$account)
                    ->line('Client: '.$this->account->name)
                    ->line('Leverage: '.$this->account->leverage)
                    ->line('Phone: '.$this->account->calling_code . $this->account->phone)
                    ->line('Platform: '.$platform_text)
                    ->line('Account type: '.$account_type_text)
                    ->line('Email: '.$this->account->email)
                    ->line('You Challenge: '.$this->account->description)
                    ->line('Country: '.$country_text)
                    ->line('Wallet: '.$package_text )
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
