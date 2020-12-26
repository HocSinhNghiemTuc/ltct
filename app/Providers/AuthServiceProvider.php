<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', function ($user) {
            return $user->checkPermissionAccess('admin');
        });
        Gate::define('category-list', function ($user) {
            return $user->checkPermissionAccess('list_category');
        });
        Gate::define('category-add', function ($user) {
            return $user->checkPermissionAccess('add_category');
        });
        Gate::define('category-edit', function ($user) {
            return $user->checkPermissionAccess('edit_category');
        });
        Gate::define('category-delete', function ($user) {
            return $user->checkPermissionAccess('delete_category');
        });
        Gate::define('contact-list', function ($user) {
            return $user->checkPermissionAccess('list_contact');
        });
        Gate::define('contact-add', function ($user) {
            return $user->checkPermissionAccess('add_contact');
        });
        Gate::define('contact-edit', function ($user) {
            return $user->checkPermissionAccess('edit_contact');
        });
        Gate::define('contact-delete', function ($user) {
            return $user->checkPermissionAccess('delete_contact');
        });
        Gate::define('feedback-solved', function ($user) {
            return $user->checkPermissionAccess('solved_feedback');
        });
        Gate::define('feedback-list', function ($user) {
            return $user->checkPermissionAccess('list_feedback');
        });
        Gate::define('contact-state', function ($user) {
            return $user->checkPermissionAccess('state_contact');
        });
        Gate::define('contact-show', function ($user) {
            return $user->checkPermissionAccess('show_contact');
        });
        Gate::define('user-add', function ($user) {
            return $user->checkPermissionAccess('add_user');
        });
        Gate::define('user-list', function ($user) {
            return $user->checkPermissionAccess('list_user');
        });
        Gate::define('user-edit', function ($user) {
            return $user->checkPermissionAccess('edit_user');
        });
        Gate::define('user-delete', function ($user) {
            return $user->checkPermissionAccess('delete_user');
        });
        Gate::define('role-list', function ($user) {
            return $user->checkPermissionAccess('list_role');
        });
        Gate::define('role-add', function ($user) {
            return $user->checkPermissionAccess('add_role');
        });
        Gate::define('role-edit', function ($user) {
            return $user->checkPermissionAccess('edit_role');
        });
        Gate::define('role-delete', function ($user) {
            return $user->checkPermissionAccess('delete_role');
        });
        Gate::define('slider-list', function ($user) {
            return $user->checkPermissionAccess('list_slider');
        });
        Gate::define('slider-add', function ($user) {
            return $user->checkPermissionAccess('add_slider');
        });
        Gate::define('slider-edit', function ($user) {
            return $user->checkPermissionAccess('edit_slider');
        });
        Gate::define('slider-delete', function ($user) {
            return $user->checkPermissionAccess('delete_slider');
        });

    }
}
