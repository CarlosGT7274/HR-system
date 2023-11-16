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

        $file_types = [
            '.txt' => 'text/plain',
            '.rtf' => 'application/rtf',
            '.doc' => 'application/msword',
            '.docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            '.pdf' => 'application/pdf',
            '.csv' => 'text/csv',
            '.xml' => 'application/xml',
            '.json' => 'application/json',
            '.zip' => 'application/zip',
            '.rar' => 'application/x-rar-compressed',
            '.7z' => 'application/x-7z-compressed',
            '.mp3' => 'audio/mpeg',
            '.wav' => 'audio/wav',
            '.mp4' => 'video/mp4',
            '.avi' => 'video/x-msvideo',
            '.webm' => 'video/webm',
            '.jpg' => 'image/jpeg',
            '.jpeg' => 'image/jpeg',
            '.png' => 'image/png',
            '.gif' => 'image/gif',
            '.bmp' => 'image/bmp',
            '.svg' => 'image/svg+xml',
            '.webp' => 'image/webp',
        ];

        $this->app->instance('file_types', $file_types);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
