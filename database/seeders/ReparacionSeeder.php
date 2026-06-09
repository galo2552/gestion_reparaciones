<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reparacion;

class ReparacionSeeder extends Seeder
{

    public function run(): void
    {
        $reparaciones = [
            [
                'nombre_cliente' => 'Galo Rosselli',
                'marca' => 'Apple',
                'modelo' => 'iPhone 13 Pro',
                'descripcion_falla' => 'Pantalla astillada y falta de respuesta táctil en el cuadrante inferior izquierdo.',
                'fecha_ingreso' => '2026-06-01',
                'estado' => 'Ingresado',
            ],
            [
                'nombre_cliente' => 'Sofía Martínez',
                'marca' => 'Samsung',
                'modelo' => 'Galaxy S22 Ultra',
                'descripcion_falla' => 'La batería se descarga muy rápido y el pin de carga tiene juego al conectar el cable USB-C.',
                'fecha_ingreso' => '2026-06-03',
                'estado' => 'En reparación',
            ],
            [
                'nombre_cliente' => 'Carlos López',
                'marca' => 'Motorola',
                'modelo' => 'Edge 30 Neo',
                'descripcion_falla' => 'El dispositivo se reinicia solo constantemente luego de una actualización de software. No pasa del logo.',
                'fecha_ingreso' => '2026-06-04',
                'estado' => 'En reparación',
            ],
            [
                'nombre_cliente' => 'Lucía Fernández',
                'marca' => 'Xiaomi',
                'modelo' => 'Redmi Note 12 Pro',
                'descripcion_falla' => 'Cambio de módulo de cámara trasera por rotura del vidrio protector exterior.',
                'fecha_ingreso' => '2026-06-05',
                'estado' => 'Reparado',
            ],
            [
                'nombre_cliente' => 'Esteban Quito',
                'marca' => 'Google',
                'modelo' => 'Pixel 7',
                'descripcion_falla' => 'No enciende tras caerse al agua. Se realizó limpieza química interna de la placa.',
                'fecha_ingreso' => '2026-05-28',
                'estado' => 'Entregado',
            ],
        ];

        foreach ($reparaciones as $reparacion) {
            Reparacion::create($reparacion);
        }
    }
}
