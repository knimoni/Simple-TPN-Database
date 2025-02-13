<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

class YourController extends Controller
{
    public function fetchData()
    {
        // Panggil API dari InfinityFree
        $response = Http::get("http://knimoni.infy.uk/db-api.php");
        
        // Ubah response menjadi array
        $data = $response->json();

        // Kirim data ke view
        return view('index', ['data' => $data]);
    }
}
