<?php

namespace App\Providers;

use App\Companies\Company;
use Laravel\Spark\Contracts\Repositories\AnnouncementRepository;
use Laravel\Spark\Contracts\Repositories\NotificationRepository;
use Laravel\Spark\Spark;
use Laravel\Spark\Providers\AppServiceProvider as ServiceProvider;
use Laravel\Spark\Contracts\Repositories\UserRepository;

class SparkServiceProvider extends ServiceProvider
{
    /**
     * Your application and company details.
     *
     * @var array
     */
    protected $details = [
        'vendor' => 'Bloggermedia',
        'product' => 'The Bloggerlist',
        'street' => 'Toernooiveld 200',
        'location' => '6525 EC Nijmegen',
        'phone' => '+31 (24) 3553318',
    ];

    /**
     * The address where customer support e-mails should be sent.
     *
     * @var string
     */
    protected $sendSupportEmailsTo = 'support@thebloggerlist.com';

    /**
     * All of the application developer e-mail addresses.
     *
     * @var array
     */
    protected $developers = [
        'Rob_Gloudemans@hotmail.com'
    ];

    /**
     * Indicates if the application will expose an API.
     *
     * @var bool
     */
    protected $usesApi = false;

    /**
     * Finish configuring Spark for the application.
     *
     * @return void
     */
    public function booted()
    {
//        Spark::collectEuropeanVat('NL');

        \Laravel\Cashier\Cashier::useCurrency('eur', '€');

        Spark::useStripe()
            ->noCardUpFront()->trialDays(10);

//        Spark::freePlan()
//            ->features([
//                'First', 'Second', 'Third'
//            ]);

        Spark::plan('Silver Plan', 'bloggerlist-silver')
            ->price(10)
            ->features([
                'First', 'Second', 'Third'
            ]);

        Spark::plan('Gold Plan', 'bloggerlist-gold')
            ->price(20)
            ->features([
                'First', 'Second', 'Third'
            ]);
    }

    public function register()
    {
        Spark::swap(UserRepository::class.'@create', function ($data) {
            $userRepo = $this->app->make(UserRepository::class);
            $user = $userRepo->create($data);
            $user->type = 'company';
            $user->save();

            $user->company()->save(new Company);
            
            $notifications = $this->app->make(NotificationRepository::class);
            $notifications->create($user, [
                'icon' => 'fa-users',
                'body' => 'Welcome ' . $user->name .', thanks for signing up. We hope you\'ll be able to find your way around the site. If in doubt, please send is a message and we\'ll help you! As a starter, why don\'t you completed your profile information?',
                'action_text' => 'Complete your profile',
                'action_url' => '/settings#/profile',
            ]);

            return $user;
        });
    }
}
