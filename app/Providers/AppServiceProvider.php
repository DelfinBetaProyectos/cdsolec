<?php

namespace App\Providers;

use Bouncer;
use App\View\Composers\CategoriesComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\{App, Schema, URL, View};

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    Schema::defaultStringLength(191);

    Bouncer::tables([
      'abilities' => 'bouncer_abilities',
      'permissions' => 'bouncer_permissions',
      'roles' => 'bouncer_roles',
      'assigned_roles' => 'bouncer_assigned_roles',
    ]);

    if(App::environment('production')) {
      URL::forceScheme('https');
    }
  }

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    View::composer([
      'welcome', 'layouts.menu', 'web.about', 'web.brands', 'web.products', 'web.product', 'web.cart', 'web.contact'
    ], CategoriesComposer::class);
  }
}
