<?php

namespace App\Services;

use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Http;

class HomeServices
{
    public function getData(): array
    {
        try {
            $get = Http::get("https://mocki.io/v1/92a1f2ef-bef2-4f84-8f06-1965f0fca1a7")->json();

            $capres = $get['calon_presiden'];
            $cawapres = $get['calon_wakil_presiden'];

            usort($capres, function ($a, $b) {
                return strcmp($a['nomor_urut'], $b['nomor_urut']);
            });
            usort($cawapres, function ($a, $b) {
                return strcmp($a['nomor_urut'], $b['nomor_urut']);
            });
        } catch (RequestException $e) {
            throw new ('Request timeout or Connection error');
        }

        return [
            'capres' => $capres,
            'cawapres' => $cawapres
        ];
    }
}
