<?php

namespace App\Providers;

use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                ->subject('Verificar Cuenta')
                ->greeting('Hola ' . $notifiable->name)
                ->line('Tu cuenta ya está casi lista, solo debes presionar el enlace a continuación')
                ->action('Confirmar Cuenta', $url)
                ->line('Si no creaste esta cuenta, puedes ignorar este mensaje')
                ->salutation(new HtmlString(
                    'Saludos '.'<br>' .'<strong>'. 'DevJobs' . '</strong>'
                    ));
        });
    }
}
