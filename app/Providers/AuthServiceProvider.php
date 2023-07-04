<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Book;
use Illuminate\Foundation\Auth\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('writer', function ($user) {
            return $user->role === 'writer';
        });

        Gate::define('reader', function ($user) {
            return $user->role === 'reader';
        });

        Gate::define('update-book', function (User $user, Book $book) {
            return $user->id === $book->author_id;
        });
    }
}
