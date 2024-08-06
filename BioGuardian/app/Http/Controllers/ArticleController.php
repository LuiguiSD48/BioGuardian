<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ArticleController extends Controller
{
    public function index()
    {
        // Llamar a la API para obtener los artículos
        $response = Http::get('https://newsapi.org/v2/everything', [
            'q' => 'medioambiente OR "cambio climatico" OR "especies en peligro" OR biodiversidad OR "medio ambiente"',
            'apiKey' => 'b4fc6c61ae1a4bffa57fc654c3e96bdb',  // Reemplaza con tu clave API
            'language' => 'es',
        ]);

        // Registrar el contenido de la respuesta de la API
        Log::info('Respuesta de la API:', $response->json());

        // Verificar si la llamada a la API fue exitosa
        if ($response->successful()) {
            $articles = $response->json()['articles'] ?? [];
        } else {
            $articles = [];
        }

        // Pasar la variable $articles a la vista
        return view('news', compact('articles'));
    }
}
