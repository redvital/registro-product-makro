<?php

namespace App\Providers;

use App\Actions\Jetstream\DeleteUser;
use App\Models\Store;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Laravel\Jetstream\Jetstream;

class JetstreamServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        
        Fortify::registerView(function () {
            // $stores = Store::pluck('name', 'id');
            // $stores = DB::table('stores')->pluck('name', 'id');
            // $stores = Store::pluck('name', 'id');
            $stores = Store::select('stores.id', 'stores.name')
            ->get();

            return view('auth.register', compact('stores'));
        });    
    }

    /**
     * Configure the permissions that are available within the application.
     */
    protected function configurePermissions(): void
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
}
