<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
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

        Gate::define('admin', function (User $user) {
            return $user->isAdmin == "1";
        });
        Gate::define('premiumAdminPostowner', function (User $user,$id) 
        {
            $post_data=Post::find($id);
            $postOwnerId=$post_data->user_id;
            return $user->isPremium == "1" || $user->isAdmin == "1"||$user->id==$postOwnerId;
        });
    }
}
