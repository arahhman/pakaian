<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Pakaian\Kaos;
use App\Pakaian\Jaket;
use Carbon\Carbon;
use Illuminate\Support\Arr;

class GreetingPakaianController extends Controller
{
    public function index()
    {
        $kaos = new Kaos('Kaos', 'Adidas', 'L');
        $jaket = new Jaket('Jaket', 'Nike', 'Nylon');

        echo $kaos->greeting();
        echo "<br>";
        echo $jaket->greeting();
    }

    public function logGreetings()
    {
        $kaos = new Kaos('Kaos', 'Adidas', 'L');
        $jaket = new Jaket('Jaket', 'Nike', 'Nylon');

        $kaosGreeting = $kaos->greeting();
        $jaketGreeting = $jaket->greeting();

        // Log::info($kaosGreeting);
        // Log::info($jaketGreeting);
        $date = Carbon::now()->format('Y-m-d');
        $logname = Arr::last(explode("\\", get_class())) . "-{$date}.log";
        Log::build([
            'driver' => 'single',
            'path' => storage_path("logs/{$logname}"),
        ])->info($kaosGreeting);

        Log::build([
            'driver' => 'single',
            'path' => storage_path("logs/{$logname}"),
        ])->info($jaketGreeting);

        return response()->json([
            'message' => 'Greetings have been logged.'
        ]);
    }
}
