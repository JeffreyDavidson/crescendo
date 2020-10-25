<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Builder::macro('search', function ($field, $string) {
            return $string ? $this->where($field, 'like', '%'.$string.'%') : $this;
        });

        Builder::macro('searchRelationship', function ($relationship, $field, $string) {
            return $string ? $this->orWhereHas($relationship, function ($query) use ($field, $string) {
                return $query->where($field, 'like', '%'.$string.'%');
            }) : $this;
        });
    }
}
