<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;

class TraductorApi extends Controller
{
    public function traducir(Request $request)
    {
        $request->validate([
            'texto' => 'required|string',
        ]);

        $apiKey = "18ef9366-c1e9-415d-b6db-839ac5c2e9c3:fx";
        $texto = $request->input('texto');

        // Obtenemos el locale de la aplicación
        $idiomaDestino = strtoupper(App::getLocale()); // ejemplo: "EN", "FR", "CA"
        
        // Eliminamos el dd() que estaba interrumpiendo la ejecución
        
        // Verificamos que el idioma esté en formato correcto para DeepL
        if ($idiomaDestino == 'ES') {
            // Si el idioma es español, podemos devolver el texto original
            return response()->json([
                'traducido' => $texto,
            ]);
        }
        
        // Lista de códigos de idioma válidos para DeepL
        $idiomasValidos = ['BG', 'CS', 'DA', 'DE', 'EL', 'EN', 'ES', 'ET', 'FI', 'FR', 'HU', 'ID', 'IT', 'JA', 'KO', 'LT', 'LV', 'NB', 'NL', 'PL', 'PT', 'RO', 'RU', 'SK', 'SL', 'SV', 'TR', 'UK', 'ZH'];
        
        // Si el idioma no está en la lista, usamos inglés por defecto
        if (!in_array($idiomaDestino, $idiomasValidos)) {
            $idiomaDestino = 'EN';
        }

        try {
            $response = Http::withHeaders([
                'Authorization' => "DeepL-Auth-Key $apiKey",
            ])->asForm()->post('https://api-free.deepl.com/v2/translate', [
                'text' => $texto,
                'target_lang' => $idiomaDestino,
                'source_lang' => 'ES', // Cambiado a español como idioma original
            ]);

            if ($response->failed()) {
                return response()->json(['error' => 'Error en la traducción.'], 500);
            }

            $traducido = $response->json()['translations'][0]['text'] ?? null;

            return response()->json([
                'traducido' => $traducido,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error en la traducción: ' . $e->getMessage()], 500);
        }
    }
}