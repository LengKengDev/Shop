<?php

namespace App\Providers;

use App\Item;
use App\Observers\ItemObserver;
use App\Observers\UserObserver;
use App\User;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Item::observe(ItemObserver::class);

        Blade::directive('money', function ($amount) {
            return "<?php echo number_format($amount, 2); ?>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
