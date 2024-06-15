<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class FetchRajaongkirData extends Command
{
    protected $signature = 'fetch:rajaongkir-data';
    protected $description = 'Fetch data from Rajaongkir API and store it into database';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $apiKey = env('RAJAONGKIR_API_KEY', '0df6d5bf733214af6c6644eb8717c92c');

        // Fetch Provinces
        $response = Http::withHeaders(['key' => $apiKey])->get('https://api.rajaongkir.com/starter/province');
        $provinces = $response->json()['rajaongkir']['results'];

        DB::table('provinces')->truncate();
        foreach ($provinces as $province) {
            DB::table('provinces')->insert([
                'id' => $province['province_id'],
                'name' => $province['province']
            ]);
        }

        // Fetch Cities
        $response = Http::withHeaders(['key' => $apiKey])->get('https://api.rajaongkir.com/starter/city');
        $cities = $response->json()['rajaongkir']['results'];

        DB::table('cities')->truncate();
        foreach ($cities as $city) {
            DB::table('cities')->insert([
                'id' => $city['city_id'],
                'province_id' => $city['province_id'],
                'name' => $city['city_name']
            ]);
        }

        $this->info('Data fetched and stored successfully.');
    }
}
