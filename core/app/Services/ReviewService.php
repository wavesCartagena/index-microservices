<?php

namespace App\Services;

use App\Models\ReviewModel;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReviewService
{

    public static function registerReviews($request)
    {
        // Validación de los datos enviados
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'rating' => 'required|integer|min:1|max:5',
            'opinion' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        // return $request;
        try {
            // Manejo del archivo de imagen (si está presente)
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('reviews', 'public');
            }

            $urlProd = "https://wavescartagena.com.co/microservices/core/storage/app/public/";

            // return $urlProd.$imagePath;

            // Creación del registro en la base de datos
            $review = ReviewModel::create([
                'name' => $validated['name'],
                'last_name' => $validated['last_name'],
                'rating' => $validated['rating'],
                'opinion' => $validated['opinion'],
                'image_path' => $urlProd.$imagePath,
            ]);

            // Respuesta exitosa utilizando ApiResponse
            return ApiResponse::response(1, $review);

        } catch (\Exception $e) {
            // Manejo de errores y respuesta con ApiResponse
            return ApiResponse::response(4, null, ['error' => $e->getMessage()]);
        }
    }

    public static function getReviewsTop(){

        try {
            // Consultar las 10 primeras reseñas que cumplan las condiciones
            $reviews = ReviewModel::where('isVisible', 1)
                ->where('rating', 5)
                ->orderBy('created_at', 'desc') // Ordenar por fecha de creación descendente
                ->take(10) // Limitar a las 10 primeras
                ->get();

            // Respuesta exitosa utilizando ApiResponse
            return ApiResponse::response(1, $reviews->toArray());

        } catch (\Exception $e) {
            // Manejo de errores y respuesta con ApiResponse
            return ApiResponse::response(4, null, ['error' => $e->getMessage()]);
        }
    }

}
