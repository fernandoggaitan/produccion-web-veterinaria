<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Servicio;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Servicio::create([
            'nombre' => 'Castración gata hembra',
            'precio' => 150000,
            'categoria_id' => 2
        ]);

        Servicio::create([
            'nombre' => 'Castración gato macho',
            'precio' => 100000,
            'categoria_id' => 2
        ]);

        Servicio::create([
            'nombre' => 'Castración perra hembra',
            'precio' => 150000,
            'categoria_id' => 1
        ]);

        Servicio::create([
            'nombre' => 'Castración perro macho',
            'precio' => 100000,
            'categoria_id' => 1
        ]);

        Servicio::create([
            'nombre' => 'Vacuna antirrábica perra/o',
            'precio' => 50000,
            'categoria_id' => 1
        ]);

        Servicio::create([
            'nombre' => 'Vacuna antirrábica gata/o',
            'precio' => 50000,
            'categoria_id' => 2
        ]);

        Servicio::create([
            'nombre' => 'Vacuna antirrábica gata/o',
            'precio' => 50000,
            'categoria_id' => 2
        ]);

    }
}
