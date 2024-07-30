<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DisplayPakaianData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:display-pakaian-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Menampilkan data pakaian';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $url = 'http://localhost:8000/api/pakaian';

        $bearerToken = '1|dOsB7fYtMmJmJlCxsUTrZ0PVAPVVAgBhKEH2gwIG76358d11';

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $bearerToken,
            'Content-Type: application/json',
        ]);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo json_encode(['error' => curl_error($ch)]);
        } else {
            $decodedResponse = json_decode($response, true);

            echo json_encode($decodedResponse, JSON_PRETTY_PRINT);
        }

        curl_close($ch);
    }
}
