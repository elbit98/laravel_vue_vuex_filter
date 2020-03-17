<?php

namespace App\Http\Controllers;

use App\Services\HouseService;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    private $houseService;

    public function __construct()
    {
        $this->houseService = new HouseService();
    }

    public function search(Request $request)
    {
        $houses = $this->houseService->filter($request);

        return response()->json($houses);
    }
}
