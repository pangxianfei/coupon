<?php

namespace Lian\Coupon;

use Illuminate\Support\ServiceProvider;

class CouponServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/coupon.php' => config_path('coupon.php'),
        ], 'config');

        if (!class_exists('CreateCouponsTable')) {
            $timestamp = date('Y_m_d_His', time());
            $this->publishes([
                __DIR__ . '/../database/migrations/2018_08_24_104218_create_coupons_table.php' => $this->app->databasePath() . "/migrations/{$timestamp}_create_coupons_tables.php",
            ], 'migrations');
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/coupon.php',
            'coupon'
        );
    }
}
