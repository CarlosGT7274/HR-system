<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $estados = [
            'Aguascalientes',
            'Baja California',
            'Baja California Sur',
            'Campeche',
            'Chiapas',
            'Chihuahua',
            'Ciudad de México',
            'Coahuila',
            'Colima',
            'Durango',
            'Estado de México',
            'Guanajuato',
            'Guerrero',
            'Hidalgo',
            'Jalisco',
            'Michoacán',
            'Morelos',
            'Nayarit',
            'Nuevo León',
            'Oaxaca',
            'Puebla',
            'Querétaro',
            'Quintana Roo',
            'San Luis Potosí',
            'Sinaloa',
            'Sonora',
            'Tabasco',
            'Tamaulipas',
            'Tlaxcala',
            'Veracruz',
            'Yucatán',
            'Zacatecas',
        ];

        $this->app->instance('estados_mx', $estados);

        $estados_civiles = [
            'Soltero/a',
            'Casado/a',
            'Divorciado/a',
            'Separado/a en proceso judicial',
            'Viudo/a',
            'Concubinato',
        ];

        $this->app->instance('estados_civiles', $estados_civiles);

        $parentescos = [
            'Padre',
            'Madre',
            'Hermano',
            'Hermana',
            'Abuelo',
            'Abuela',
            'Esposo',
            'Esposa',
            'Hijo',
            'Hija',
            'Suegro',
            'Suegra',
            'Cuñado',
            'Cuñada',
            'Yerno',
            'Nuera',
            'Tío',
            'Tía',
            'Sobrino',
            'Sobrina',
        ];

        $this->app->instance('parentescos', $parentescos);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
