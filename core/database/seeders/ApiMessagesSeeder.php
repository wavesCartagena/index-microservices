<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ApiMessage;

class ApiMessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ApiMessage::insert([
            ['code' => 1, 'message' => 'Operación realizada con éxito', 'http_status' => 200],
            ['code' => 2, 'message' => 'Contenido no disponible', 'http_status' => 204],
            ['code' => 3, 'message' => 'Solicitud incorrecta', 'http_status' => 400],
            ['code' => 4, 'message' => 'No autorizado', 'http_status' => 401],
            ['code' => 5, 'message' => 'Acceso prohibido', 'http_status' => 403],
            ['code' => 6, 'message' => 'Recurso no encontrado', 'http_status' => 404],
            ['code' => 7, 'message' => 'Error interno del servidor', 'http_status' => 500],
            // Agrega aquí más mensajes según sea necesario
        ]);
    }
}
