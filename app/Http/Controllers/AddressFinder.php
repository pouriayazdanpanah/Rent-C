<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;


trait AddressFinder
{
    public function getLocation($lat,$lng)
    {
        $response = Http::withHeaders(['Api-Key' =>env('NESHAN_API_KEY'),])
            ->get("https://api.neshan.org/v2/reverse?lat=$lat&lng=$lng");

        $response->throw();

        return $response->json();
    }
}
