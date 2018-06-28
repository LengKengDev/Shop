<?php

namespace App\Providers;

use App\Category;
use App\Item;
use App\Observers\CategoryObserver;
use App\Observers\ItemObserver;
use App\Observers\OptionObserver;
use App\Observers\UserObserver;
use App\Option;
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
        Category::observe(CategoryObserver::class);
        Option::observe(OptionObserver::class);

        Blade::directive('money', function ($amount) {
            return "<?php echo number_format($amount, 0); ?>";
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
